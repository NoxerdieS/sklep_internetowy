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

const forgot_password = (e) => {
	e.preventDefault();
	formData.append('email', email.value);
	fetch('http://localhost/sklep_internetowy/php/forgot_password.php', {
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
actionBtn.addEventListener('click', forgot_password);
popUpCloseBtn.addEventListener('click', closePopUp);
