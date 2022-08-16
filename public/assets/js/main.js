const followUserBtnEls = document.querySelectorAll('#follow-user-btn');

// \/ Follow Btn \/
followUserBtnEls.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const uid = e.target.dataset.uid;
        // TODO: 
        alert(`clicked ${uid}`);
    });
});
// /\ Follow Btn /\
