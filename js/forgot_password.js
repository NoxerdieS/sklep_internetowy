const formData = new FormData();
const email = document.querySelector('#email');
const actionBtn = document.querySelector('#login_form_send');
const popUp = document.querySelector('.register__popup');
const popUpCloseBtn = document.querySelector('.register__popup--closeBtn');
const error = document.querySelector('.error');

const closePopUp = () => {
	popUp.style.visibility = 'hidden';
	actionBtn.disabled = false;
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

const forgot_password = (e) => {
	e.preventDefault();
	formData.append('email', email.value);
	fetch('../php/forgot_password.php', {
		method: 'POST',
		body: formData,
	})
		.then(function (response) {
			return response.text();
		})
		.then(function (body) {
			result = body;
			console.log(result);
			if (result === 'success') {
				error.style.visibility = 'hidden';
				error.textContent = '';
				popUp.style.visibility = 'visible';
				actionBtn.disabled = true;
			} else if (result === '      0') {
				error.style.visibility = 'visible';
				error.textContent = 'Nie istnieje konto z podanym adresem email';
			}
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
		forgot_password();
	}
};

actionBtn.addEventListener('click', () =>{
    checkMail(email);
    checkErrors();
});
popUpCloseBtn.addEventListener('click', closePopUp);
