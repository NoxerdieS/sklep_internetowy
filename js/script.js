const loginButton = document.querySelector('#login_form_send');
const loginForm = document.querySelector("#login_form");
const formData = new FormData(loginForm, loginButton);
const getFormData = async () => {
    const res = fetch("http://localhost/sklep_internetowy/php/login.php", {
        method: "POST",
        body: formData})
    const sex = await res;
    console.log(sex);

}
loginButton.addEventListener('click', getFormData)
