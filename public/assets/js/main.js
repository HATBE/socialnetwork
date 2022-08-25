// \/ CHECK IF USER IS LOGGEDIN \/
setInterval(() => {
    $.ajax({
        type: 'GET',
        url: '/_dynamicapi/amiloggedin'
    })
    .done(data => {
        if(data.responseText == 'false') {
            window.location.href = '/login';
        }
    });
}, 30_000); 
// /\ CHECK IF USER IS LOGGEDIN /\

// \/ FOLLOW BTNS \/
const followUserBtnEls = document.querySelectorAll('#user-follow-btn');
const followersCountEls = document.querySelectorAll('#user-followers-count');

followUserBtnEls.forEach(btn => {
    btn.addEventListener('click', (e) => {
        if(e.target.dataset.type === 'follow') {
            const id = e.target.dataset.id;
        
            $.ajax({
                type: 'POST',
                contentType: 'application/json',
                url: '/_dynamicapi/follow',
                data: JSON.stringify({id: id})
            })
            .done(data => {
                // change btn from unfollow to follow
                e.target.classList.remove('btn-primary');
                e.target.classList.add('btn-danger');
                e.target.textContent = 'Unfollow';
                e.target.dataset.type = 'unfollow';

                // add one from followers counter
                followersCountEls.forEach(el => {
                    if(el.dataset.id == id) {
                        el.textContent = parseInt(el.textContent) + 1;
                    }
                });
            })
            .fail(data => {
                alert(`Following failed: ${data.responseText}`);
            });
        } else if (e.target.dataset.type === 'unfollow') {
            const id = e.target.dataset.id;
        
            $.ajax({
                type: 'POST',
                contentType: 'application/json',
                url: '/_dynamicapi/unfollow',
                data: JSON.stringify({id: id})
            })
            .done(data => {
                // change btn from follow to unfollow
                e.target.classList.remove('btn-danger');
                e.target.classList.add('btn-primary');
                e.target.textContent = 'Follow';
                e.target.dataset.type = 'follow';

                // remove one from followers counter
                followersCountEls.forEach(el => {
                    if(el.dataset.id == id) {
                        el.textContent = parseInt(el.textContent) - 1;
                    }
                });
            })
            .fail(data => {
                alert(`Following failed: ${data.responseText}`);
            });
        } else {
            alert('error');
        }
    });
});
// /\ FOLLOW BTNS /\