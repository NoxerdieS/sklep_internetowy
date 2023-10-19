<?php
//session_start();
//if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']){
//  header('Location: ../index.php');
//}
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
  <nav class="nav nav__mobile">
      <button class="nav__mobile--bars"><i class="fa-solid fa-bars"></i></button>
    </nav>
    <nav class="nav__desktop">
      <div class="nav__items">
        <a href="../index.php" class="nav__item nav__item--logo"></a>
        <a href="#" class="nav__item link link-animation">Alkohole mocne</a>
        <a href="#" class="nav__item link link-animation"
          >Wina</a
        >
        <a href="#hardware" class="nav__item link link-animation">Piwa</a>
        <a href="#" class="nav__item link link-animation">Kursy</a>
      </div>
      <div class="nav__user">
        <div class="nav__user--search">
          <input type="text" placeholder="Wyszukaj..." /><i
            class="fa-solid fa-magnifying-glass"
          ></i>
        </div>
        <a href="#cart" class="nav__user--cart"
          ><i class="fa-solid fa-cart-shopping"></i
        ><p>Koszyk</p></a>
        <?php //if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
          <a href="../html/user_panel.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-user"></i>
          <p>Twoje konto</p>
          </a>
          <a href="../php/logout.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p>Wyloguj się</p></a> 
        <?php //else: ?>
          <!-- <a href="../html/login_page.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-right-to-bracket"></i>
          <p>Zaloguj się</p></a> -->
        <?php //endif; ?>
      </div>
    </nav>
    <main class="user">
          <section class="user__menu">
            <a href="" class="user__menu--item link two">Zamówiena</a>
            <a href="" class="user__menu--item link two">Zwroty i reklamacje</a>
            <a href="" class="user__menu--item link two">Opinie</a>
            <a href="" class="user__menu--item link two">Dane do zamówienia</a>
            <a href="" class="user__menu--item link two">Ustawienia konta</a>
          </section>
          <section class="user__section"></section>
    </main>
</body>
</html>
