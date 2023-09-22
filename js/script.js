const registerButton = document.querySelector('#register_form_send');
const loginButton = document.querySelector('#login_form_send');
const getFormData = async (e) => {
    e.preventDefault();
    const formData = new FormData();
    const loginForm = document.querySelector("#login_form");
    formData.append('login', loginForm.elements['login'].value);
    formData.append('password', loginForm.elements['password'].value);
    fetch("http://localhost/sklep_internetowy/php/login.php", {
        method: "POST",
        body: formData
        })
        .then(function (response) {
            return response.text();
          })
          .then(function (body) {
            console.log(body);
          });

}
const register = async (e) => {
    e.preventDefault();
    const registerForm = document.querySelector("#register_form");
    const formData = new FormData();
    formData.append('name', registerForm.elements['name'].value);
    formData.append('lastname', registerForm.elements['lastname'].value);
    formData.append('email', registerForm.elements['email'].value);
    formData.append('login', registerForm.elements['login'].value);
    formData.append('password', registerForm.elements['password'].value);
    formData.append('phone', registerForm.elements['phone'].value);
    formData.append('address', registerForm.elements['address'].value);
    formData.append('postcode', registerForm.elements['postcode'].value);
    formData.append('city', registerForm.elements['city'].value);
    formData.append('country', registerForm.elements['country'].value);
    const res = fetch("http://localhost/sklep_internetowy/php/register.php", {
        method: "POST",
        body: formData})
        .then(function (response) {
            return response.text();
          })
          .then(function (body) {
            console.log(body);
          });
}
// loginButton.addEventListener('click', getFormData);
registerButton.addEventListener('click', register);