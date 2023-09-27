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

const nameTable = ['name', 'lastname', 'email', 'login', 'password', 'phone_code', 'phone', 'address', 'postcode', 'city', 'country'];
let result;
const register = async (e) => {
	nameTable.forEach((element) => formData.append(element, registerForm.elements[element].value))
	fetch('http://localhost/sklep_internetowy/php/register.php', {
		method: 'POST',
		body: formData,
	})
		.then(function (response) {
			return response.text();
		})
		.then(function (body) {
			result = body
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
	checkForm([name, lastname, email, login, password]);
	checkLength(login, 3);
	checkLength(password, 8);
	checkMail(email);
	checkErrors();
});
