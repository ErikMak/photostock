function checkUsername(form) {
	let valid = false;

	const input = form.querySelector('#signup-username');
	const value = input.value;
	const rv_username = /^(?=.{1,24}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/;
	
	if(value != '' && rv_username.test(value)) {
		valid = true;
		setSuccessFor(input.parentElement);
	} else {
		setErrorFor(input.parentElement, 'Некорректное имя пользователя!');
	}

	return valid;
}

function checkEmail(form) {
	let valid = false;

	const input = form.querySelector('#signup-email');
	const value = input.value;
	const rv_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	if(value != '' && rv_email.test(value)) {
		valid = true;
		setSuccessFor(input.parentElement);
	} else {
		setErrorFor(input.parentElement, 'Некорректный E-mail!');
	}

	return valid;
}

function checkPassword(form) {
	let valid = false;

	const input = form.querySelector('#signup-pass');
	const value = input.value.trim();
	const rv_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,20}$/;
	
	if(value != '' && rv_pass.test(value)) {
		valid = true;
		setSuccessFor(input.parentElement);
	} else {
		setErrorFor(input.parentElement, 'Некорректный пароль!');
	}

	return valid;
}

function checkConfirmPass(form) {
	let valid = false;

	const input = form.querySelector('#signup-confirm-pass');
	const value = input.value;
	const password = form.querySelector('#signup-pass').value;
	
	if(value == '') {
		setErrorFor(input.parentElement, 'Подтвердите свой пароль!');
	} else if (password != value) {
		setErrorFor(input.parentElement, 'Пароль не соотвествует!');
	} else {
		valid = true;
		setSuccessFor(input.parentElement);
	}

	return valid;
}

function setSuccessFor(form_group) {
	const small = form_group.querySelector('small');

	small.classList.remove('show');
	small.classList.add('hide');
}

function setErrorFor(form_group, msg) {
	const small = form_group.querySelector('small');
	small.classList.remove('hide');
	small.classList.add('show');

	small.innerHTML = msg;
}

function signupAction() {
	const formHandle = document.querySelector('#signup');

	let isUsernameValid = checkUsername(formHandle),
	 	isEmailValid = checkEmail(formHandle);
		isPasswordValid = checkPassword(formHandle),
		isConfirmPassValid = checkConfirmPass(formHandle);

	return isFormValid = isUsernameValid &&
		isEmailValid && 
		isPasswordValid &&
		isConfirmPassValid;
}