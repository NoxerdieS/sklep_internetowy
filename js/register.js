const registerButton = document.querySelector('#register_form_send');
const registerForm = document.querySelector('#register_form');
const name = document.querySelector('#name-register');
const lastname = document.querySelector('#lastname-register');
const email = document.querySelector('#email-register');
const login = document.querySelector('#login-register');
const password = document.querySelector('#password-register');
const formData = new FormData();

const showError = (input, name) => {
	const formBox = input.parentElement;
	const errorMsg = formBox.querySelector(`.error-${name}`);
	errorMsg.classList.add('visible');
};

const clearError = (input, name) => {
	const formBox = input.parentElement;
	const errorMsg = formBox.querySelector(`.error-${name}`);
	errorMsg.classList.remove('visible');
};

const checkForm = (input) => {
	input.forEach((el) => {
		if (el.value === '') {
			showError(el, el.name);
		} else {
			clearError(el, el.name);
		}
	});
};

const checkLength = (input, min) => {
	if (input.value.length < min) {
		showError(input, input.name);
	}
};

const checkMail = (email) => {
	const re =
		/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (re.test(email.value)) {
		clearError(email);
	} else {
		showError(email, email.name);
	}
};

const register = async (e) => {
	formData.append('name', registerForm.elements['name'].value);
	formData.append('lastname', registerForm.elements['lastname'].value);
	formData.append('email', registerForm.elements['email'].value);
	formData.append('login', registerForm.elements['login'].value);
	formData.append('password', registerForm.elements['password'].value);
	formData.append('phone_code', registerForm.elements['phone-code'].value);
	formData.append('phone', registerForm.elements['phone'].value);
	formData.append('address', registerForm.elements['address'].value);
	formData.append('postcode', registerForm.elements['postcode'].value);
	formData.append('city', registerForm.elements['city'].value);
	formData.append('country', registerForm.elements['country'].value);
	const res = fetch('http://localhost/sklep_internetowy/php/register.php', {
		method: 'POST',
		body: formData,
	})
		.then(function (response) {
			return response.text();
		})
		.then(function (body) {
			console.log(body);
		});
};

const checkErrors = () => {
	const allInputs = document.querySelectorAll('p');
	let errorCount = 0;

	allInputs.forEach((el) => {
		if (el.classList.contains('visible')) {
			errorCount++;
		}
	});

	if (errorCount === 0) {
		register();
	}
};

registerButton.addEventListener('click', (e) => {
	e.preventDefault();
	checkForm([username, pass, pass2, email]);
	checkLength(username, 3);
	checkLength(pass, 8);
	checkPassword(pass, pass2);
	checkMail(email);
	checkErrors();
});
