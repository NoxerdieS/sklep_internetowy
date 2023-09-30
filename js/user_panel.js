const p = document.querySelector('.test');
let result;
fetch('http://localhost/sklep_internetowy/php/checkUser.php')
	.then(function (response) {
		return response.text();
	})
	.then(function (body) {
		result = body;
		// console.log(result);
		if (result == '0') {
			window.location.replace('../html/login_page.html');
		} else {
			console.log(result);
			p.textContent = `Jesteś zalogowany jako ${result}`;
		}
	});
