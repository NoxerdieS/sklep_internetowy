let result;
const login = async (e) => {
	e.preventDefault();
	const formData = new FormData();
	const loginForm = document.querySelector('#login_form');
	formData.append('login', loginForm.elements['login'].value);
	formData.append('password', loginForm.elements['password'].value);
	fetch('http://localhost/sklep_internetowy/php/login.php', {
		method: 'POST',
		body: formData,
	})
		.then(function (response) {
			return response.text();
		})
		.then(function (body) {
			result = body;
			console.log(result);
			const errorMsg = document.querySelector('.error');
			if (result == '0') {
				errorMsg.textContent = 'Wprowadzono nieprawidłowe dane';
        		errorMsg.style.display = 'block';
			} else if (result == '1') {
				errorMsg.textContent = 'Konto nie jest aktywne';
        		errorMsg.style.display = 'block';
			} else {
				location.replace(result);
			}
		});
};
const loginButton = document.querySelector('#login_form_send');
loginButton.addEventListener('click', login);
