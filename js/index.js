const loginBtn = document.querySelector('.login-btn');
let result;
fetch('../php/checkUser.php')
.then(function (response){
    return response.text();
}).then(function (body){
    result = body;
	console.log(result);
	if (result == "0") {
		loginBtn.innerHTML =
		'<i class="fa-solid fa-right-to-bracket"></i><p>Zaloguj się</p>';
		loginBtn.href = 'html/login_page.html';
	} else {
		loginBtn.innerHTML =
		'<i class="fa-solid fa-right-from-bracket"></i><p>Wyloguj się</p>';
		loginBtn.href = 'html/logout_page.html';
	}
})
