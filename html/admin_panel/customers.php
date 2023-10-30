<?php

ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);

$query = $pdo -> query('select login from user');
while ($row = $query->fetch()){
    $html = '<div class="admin__product">
    <p class="admin__product--name">'.$row['login'].'</p>
    <button class="admin__add--addBtn admin__product--edit">Edytuj dane</button>
    <button class="admin__add--addBtn admin__product--delete">Usuń</button>
    </div>';
    echo $html;
}
?>

<div class="admin__popup">
      <div class="admin__contentContainer">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form class="admin__contentContainer--userForm" id="create-product-form" method="post">
            <div class="admin__formContainer">
                <label for="name">Imię:</label>
                <input type="text" name="firstname" id="firstname" class="admin__contentContainer--input" placeholder="Imię">
            </div>
            <div class="admin__formContainer">
                <label for="name">Nazwisko:</label>
                <input type="text" name="lastname" id="lastname" class="admin__contentContainer--input" placeholder="Nazwisko">
            </div>
            <div class="admin__formContainer">
                <label for="name">E-mail:</label>
                <input type="email" name="email" id="email" class="admin__contentContainer--input" placeholder="Email">
            </div>
            <div class="admin__formContainer">
                <label for="name">Telefon:</label>
                <input type="number" name="name" id="name" class="admin__contentContainer--input" placeholder="Telefon">
            </div>
            <div class="admin__formContainer">
                <label for="name">Login:</label>
                <input type="text" name="login" id="login" class="admin__contentContainer--input" placeholder="Login">
            </div>
            <div class="admin__formContainer">
                <label for="name">Hasło:</label>
                <input type="password" name="password" id="password" class="admin__contentContainer--input" placeholder="Hasło">
            </div>
            <div class="admin__formContainer">
                <label for="name">Powtórz hasło:</label>
                <input type="password" name="password2" id="password2" class="admin__contentContainer--input" placeholder="Powtórz hasło">
            </div>
            <div class="admin__formContainer">
                <label for="name">Ulica i numer:</label>
                <input type="text" name="address" id="address" class="admin__contentContainer--input" placeholder="Ulica i numer">
            </div>
            <div class="admin__formContainer">
                <label for="name">Kod pocztowy:</label>
                <input type="text" name="postcode" id="postcode" class="admin__contentContainer--input" placeholder="Kod pocztowy">
            </div>
            <div class="admin__formContainer">
                <label for="name">Miasto:</label>
                <input type="text" name="city" id="city" class="admin__contentContainer--input" placeholder="Miasto">
            </div>
        </form>
        <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
      </div>
    </div>

<?php

$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";

?>