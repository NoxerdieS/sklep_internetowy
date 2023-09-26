const register = async (e) => {
    e.preventDefault();
    const registerForm = document.querySelector("#register_form");
    const formData = new FormData();
    formData.append('name', registerForm.elements['name'].value);
    formData.append('lastname', registerForm.elements['lastname'].value);
    formData.append('email', registerForm.elements['email'].value);
    formData.append('login', registerForm.elements['login'].value);
    formData.append('password', registerForm.elements['password'].value);
    formData.append('phone_code', registerForm.elements['phone-code'].value);
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
    const registerButton = document.querySelector('#register_form_send');
    registerButton.addEventListener('click', register);