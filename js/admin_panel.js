let result;
fetch('http://localhost/sklep_internetowy/php/checkIfAdmin.php')
.then(function (response){
    return response.text();
}).then(function (body){
    result = body;
    document.body.innerHTML = result;
    if(result == '0'){
        window.location.replace('../html/login_page.html');
    }else{
        console.log(result);
        // dodaj wyświetlanie result na stronie (login używtkownika)
    }
})