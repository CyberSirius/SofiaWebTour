var dialog = document.querySelector('dialog');
dialogPolyfill.registerDialog(dialog);
var showModalButton = document.querySelector('.show-login-modal');
if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
showModalButton.addEventListener('click', function () {
    dialog.showModal();
});
dialog.querySelector('.close').addEventListener('click', function () {
    dialog.close();
});

var regReenter = document.querySelector('.reg-reenter');
var regEmail = document.querySelector('.reg-email');
var regBtn = document.querySelector('.show-register-fields');
var loginBtn = document.querySelector('.show-login-fields');

regReenter.style.display = 'none';
regEmail.style.display = 'none';

regBtn.addEventListener('click', function () {
    regReenter.style.display = 'block';
    regEmail.style.display = 'block';
});

loginBtn.addEventListener('click', function () {
    regReenter.style.display = 'none';
    regEmail.style.display = 'none';
});