// \/ FOLLOW BTNS \/
const followUserBtnEls = document.querySelectorAll('#follow-user-btn');

followUserBtnEls.forEach((btn) => {
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
                e.target.classList.remove('btn-primary');
                e.target.classList.add('btn-danger');
                e.target.textContent = 'Unfollow';
                e.target.dataset.type = 'unfollow';
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
                e.target.classList.remove('btn-danger');
                e.target.classList.add('btn-primary');
                e.target.textContent = 'Follow';
                e.target.dataset.type = 'follow';
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
