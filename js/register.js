const registerButton = document.querySelector('#register_form_send');
const registerForm = document.querySelector('#register_form');
const firstname = document.querySelector('#name-register');
const lastname = document.querySelector('#lastname-register');
const phone = document.querySelector('#phone-register');
const email = document.querySelector('#email-register');
const login = document.querySelector('#login-register');
const password = document.querySelector('#password-register');
const password2 = document.querySelector('#password2-register');
const address = document.querySelector('#address-register');
const postcode = document.querySelector('#postcode-register');
const city = document.querySelector('#city-register');
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

const checkPassword = (pass1, pass2) => {
	if (pass1.value !== pass2.value) {
		showError(pass2, pass2.name);
	} else {
		clearError(pass2, pass2.name);
	}
};

const checkMail = (email) => {
	const re =
		/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (re.test(email.value)) {
		clearError(email, email.name);
	} else {
		showError(email, email.name);
	}
};

const checkPhone = (phone) => {
	const re = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{3})/;
	if (re.test(phone.value)) {
		const formBox = phone.parentElement.parentElement;
		const errorMsg = formBox.querySelector(`.error-${phone.name}`);
		errorMsg.classList.remove('visible');
	} else {
		const formBox = phone.parentElement.parentElement;
		const errorMsg = formBox.querySelector(`.error-${phone.name}`);
		errorMsg.classList.add('visible');
	}
}

const register = async () => {
	let result;
	formData.append('name', firstname.value);
	formData.append('lastname', lastname.value);
	formData.append('email', email.value);
	formData.append('phone', phone.value);
	formData.append('login', login.value);
	formData.append('password', password.value);
	formData.append('address', address.value);
	formData.append('postcode', postcode.value);
	formData.append('city', city.value);
	console.log(formData.values())
	
	fetch('http://localhost/sklep_internetowy/php/register.php', {
		method: 'POST',
		body: formData,
	})
		.then(function (response) {
			return response.text();
		})
		.then(function (body) {
			result = body;
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
	checkForm([firstname, lastname, email, login, password, address, postcode, city]);
	checkLength(login, 3);
	checkLength(password, 8);
	checkPassword(password, password2);
	checkMail(email);
	checkPhone(phone);
	checkErrors();
});
