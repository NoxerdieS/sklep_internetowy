const loginBtn = document.querySelector('.login-btn');

const changeLoginIcon = (e) => {
	if (localStorage.getItem('status') != null) {
		loginBtn.innerHTML =
			'<i class="fa-solid fa-right-from-bracket"></i><p>Wyloguj się</p>';
	} else {
		loginBtn.innerHTML =
			'<i class="fa-solid fa-right-to-bracket"></i><p>Zaloguj się</p>';
	}
};
window.addEventListener('load', changeLoginIcon);
