const password = document.querySelector('#password');
const password2 = document.querySelector('#password2');
const error = document.querySelector('.error')
const sendBtn = document.querySelector('#change_pass_form_send');

const checkPassword = (pass1, pass2) => {
	if (pass1.value !== pass2.value) {
        error.style.display = 'block';
	} else {
		error.style.display = 'none';
	}
};

sendBtn.addEventListener('click', (e) => {
    e.preventDefault();
    checkPassword(password, password2)
});

