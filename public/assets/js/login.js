const btnLoginEl = document.getElementById('btn-login-submit');
const inputUsernameEl = document.getElementById('input-login-username');
const inputPasswordEl = document.getElementById('input-login-password');
const loginMsgEl = document.getElementById('login-msg');

function changeMsg(text, color) {
    loginMsgEl.classList.remove('text-*');
    loginMsgEl.classList.add(color);
    loginMsgEl.textContent = text;
}

function login(username, password) {
    if(username == '') {
        changeMsg('Field Username is empty!', 'text-danger');
        return;
    }
    if(password == '') {
        changeMsg('Field Password is empty!', 'text-danger');
        return;
    }
    $.ajax({
        type: 'POST',
        contentType: 'application/json',
        url: '/_dynamicapi/login',
        data: JSON.stringify({username: username, password: password})
    })
    .done(data => {
        inputPasswordEl.value = '';
        inputUsernameEl.value = '';
        changeMsg(data.text, 'text-success');
        setTimeout(() => {window.location.href = "/index"}, 750);
    })
    .fail(data => {
        inputPasswordEl.value = '';
        changeMsg(data.text, 'text-danger');
    });
}

btnLoginEl.addEventListener('click', (e) => {
    e.preventDefault();

   login(inputUsernameEl.value, inputPasswordEl.value);
});