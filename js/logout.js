fetch('../php/logout.php')
.then((response) => {
    return response.text();
}).then((body) => {
    console.log(body);
})
location.replace('../index.html');