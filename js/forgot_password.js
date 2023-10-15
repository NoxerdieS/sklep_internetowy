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
		error.style.visibility = 'hidden';
		error.textContent = '';
	} else {
		error.style.visibility = 'visible';
		error.textContent = 'Niepoprawny adres email';
	}
};

const forgot_password = () => {
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
			if (result == 'success') {
				error.style.visibility = 'hidden';
				error.textContent = '';
				popUp.style.visibility = 'visible';
				actionBtn.disabled = true;
			} else if (result == '0') {
				error.style.visibility = 'visible';
				error.textContent = 'Nie istnieje konto z podanym adresem email';
			}
		});
};

actionBtn.addEventListener('click', () => {
	checkMail(email);
});
popUpCloseBtn.addEventListener('click', closePopUp);
