<?php
session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']){
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/logo_transparent.png" type="image/x-icon">
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
    <link rel="stylesheet" href="../css/main.css" />
    <title>Zaloguj się</title>
  </head>
  <body>
    <div class="login remind">
        <div class="login__shadow"></div>
        <div class="login__field remind__field">
            <a href="../index.php" class="login__field--back"><i class="fa-solid fa-arrow-left"></i></a>
          <p style="font-size: 2.5rem;">Tu będzie panel użytkownika</p>
          <p class="test" style="font-size: 2rem;"></p>
        </div>
      </div>
    </div>
</body>
</html>
