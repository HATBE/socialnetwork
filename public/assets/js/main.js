// \/ Follow Btn \/
const followUserBtnEls = document.querySelectorAll('#follow-user-btn');

followUserBtnEls.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const id = e.target.dataset.id;
        
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: '/_dynamicapi/follow',
            data: JSON.stringify({id: id})
        })
        .done(data => {
            console.log(data);
        })
        .fail(data => {
            console.log(data);
        });

        alert(`clicked ${id}`);
    });
});
// /\ Follow Btn /\
