<?php
session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
 header('Location: ../../index.php');
}
require_once('../../php/dblogin.php');
$login = $_GET['item'];
$sql = 'select mail, login, pass, firstname, lastname, address_id, telephone, isAdmin, isActive from user where login like ?';
$user_info = $pdo ->prepare($sql);
$user_info -> execute([$login]);
$user_info = $user_info -> fetch();
$sql = 'select city, postal, address from address where id = ?';
$address_info = $pdo -> prepare($sql);
$address_info -> execute([$user_info['address_id']]);
$address_info = $address_info -> fetch();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../img/logo_transparent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/bec5797acb.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Panel administratora</title>
  </head>
  <div class="admin__contentContainer">
        <a href="./customers.php" class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></a>
        <form class="admin__contentContainer--userForm" id="create-product-form" action="../../php/admin_panel/edit_customer.php?oldLogin=<?=$_GET['item']?>&address=<?=$user_info['address_id']?>" method="post">
            <div class="admin__formContainer">
                <label for="name">Imię:</label>
                <input type="text" name="firstname" id="firstname" class="admin__contentContainer--input" placeholder="Imię" value="<?=$user_info['firstname']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">Nazwisko:</label>
                <input type="text" name="lastname" id="lastname" class="admin__contentContainer--input" placeholder="Nazwisko" value="<?=$user_info['lastname']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">E-mail:</label>
                <input type="email" name="email" id="email" class="admin__contentContainer--input" placeholder="Email" value="<?=$user_info['mail']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">Telefon:</label>
                <input type="number" name="phone" id="phone" class="admin__contentContainer--input" placeholder="Telefon" value="<?=$user_info['telephone']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">Login:</label>
                <input type="text" name="login" id="login" class="admin__contentContainer--input" placeholder="Login" value="<?=$user_info['login']?>">
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
                <input type="text" name="address" id="address" class="admin__contentContainer--input" placeholder="Ulica i numer" value="<?=$address_info['address']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">Kod pocztowy:</label>
                <input type="text" name="postcode" id="postcode" class="admin__contentContainer--input" placeholder="Kod pocztowy" value="<?=$address_info['postal']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">Miasto:</label>
                <input type="text" name="city" id="city" class="admin__contentContainer--input" placeholder="Miasto" value="<?=$address_info['city']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">isAdmin:</label>
                <input type="text" name="isAdmin" id="isAdmin" class="admin__contentContainer--input" placeholder="isAdmin" value="<?=$user_info['isAdmin']?>">
            </div>
            <div class="admin__formContainer">
                <label for="name">isActive:</label>
                <input type="text" name="isActive" id="isActive" class="admin__contentContainer--input" placeholder="isActive" value="<?=$user_info['isActive']?>">
            </div>
            <div class="admin__formContainer">
                <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
            </div>
        </form>
      </div>
    </div>
</html>