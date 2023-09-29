fetch('http://localhost/sklep_internetowy/php/logout.php')
.then((response) => {
    return response.text();
}).then((body) => {
    console.log(body);
})
location.replace('../index.html');