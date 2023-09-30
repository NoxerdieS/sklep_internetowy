let result;
fetch('http://localhost/sklep_internetowy/php/checkIfAdmin.php')
.then(function (response){
    return response.text();
}).then(function (body){
    result = body;
    document.body.innerHTML = result;
})