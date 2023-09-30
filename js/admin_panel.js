let result;
fetch('../php/checkIfAdmin.php')
.then(function (response){
    return response.text();
}).then(function (body){
    result = body;
    document.body.innerHTML = result;
})