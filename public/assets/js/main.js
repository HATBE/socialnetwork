// \/ Follow Btn \/
const followUserBtnEls = document.querySelectorAll('#follow-user-btn');

followUserBtnEls.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const uid = e.target.dataset.uid;
        
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: '/_dynamicapi/follow',
            data: JSON.stringify({uid: uid})
        })
        .done(data => {
            // TODO:
        })
        .fail(data => {
            // TODO:
        });

        alert(`clicked ${uid}`);
    });
});
// /\ Follow Btn /\
