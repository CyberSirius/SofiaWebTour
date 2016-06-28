var dialogLogin = document.querySelector('.login-form');
var dialogReg = document.querySelector('.register-form');
var dialogUplaod = document.querySelector('.upload-form');

dialogPolyfill.registerDialog(dialogLogin);
dialogPolyfill.registerDialog(dialogReg);
dialogPolyfill.registerDialog(dialogUplaod);

var showModalButton = document.querySelector('.show-login-modal');
var showRegModalButton = document.querySelector('.show-register-modal');
var showUploadModalButton = document.querySelectorAll('.show-upload-modal');

if (!dialogLogin.showModal) {
    dialogPolyfill.registerDialog(dialogLogin);
}
showModalButton.addEventListener('click', function () {
	dialogLogin.showModal();
});

dialogLogin.querySelector('.close').addEventListener('click', function () {
	dialogLogin.close();
});



if (!dialogReg.showModal) {
    dialogPolyfill.registerDialog(dialogReg);
}
showRegModalButton.addEventListener('click', function () {
	dialogReg.showModal();
});

dialogReg.querySelector('.close').addEventListener('click', function () {
	dialogReg.close();
});


for(i=0; i<showUploadModalButton.length; i++) {
	showUploadModalButton[i].addEventListener('click', function () {
		dialogUplaod.showModal();
	});
}
dialogUplaod.querySelector('.close').addEventListener('click', function () {
	dialogUplaod.close();
});