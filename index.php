<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../img/logo_transparent.png"
      type="image/x-icon"
    />

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
    <link rel="stylesheet" href="css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <nav class="nav__mobile">
      <button class="nav__mobile--bars"><i class="fa-solid fa-bars"></i></button>
      <div class="nav__mobileMenu">
        <ul>
            <li class="menu-item one">
              <p>Alkohole mocne</p>
                <ul class="dropdown dropdown-one">
                    <li>Whisky</li>
                    <li>Gin</li>
                    <li>Wódka</li>
                    <li>Rum</li>
                    <li>Tequila</li>
                </ul>
            </li>
            <hr>
            <li class="menu-item two">
                <p>Wina</p>
                <ul class="dropdown dropdown-two">
                    <li>Wytrawne</li>
                    <li>Słodkie</li>
                    <li>Półsłodkie</li>
                    <li>Musujące</li>
                </ul>
            </li>
            <hr>
            <li class="menu-item three">
            <p>Piwo</p>
                <ul class="dropdown dropdown-three">
                    <li>IPA</li>
                    <li>ALE</li>
                    <li>Lager</li>
                    <li>Stout</li>
                    <li>Pilzner</li>
                </ul>
            </li>
            <hr>
            <li class="menu-item four">
            <p>Kursy</p>
          </li>
          <hr>
        </ul>
      </div>
    </nav>
    <nav class="nav__desktop">
      <div class="nav__items">
        <a href="./index.php" class="nav__item--logo"></a>
        <a href="#" class="nav__item link link-animation">Alkohole mocne</a>
        <div class="nav__dropdown nav__dropdown--one">
          <div class="nav__dropdown--left">
            <a href="" class="link link-animation">Whisky</a>
            <a href="" class="link link-animation">Gin</a>
            <a href="" class="link link-animation">Wódka</a>
            <a href="" class="link link-animation">Rum</a>
            <a href="" class="link link-animation">Tequila</a>
          </div>
          <div class="nav__dropdown--right">
            <img src="./img/placeholder_image.jpg" alt="">
            <p>Lorem ipsum, quia dol</p>
            <p>150zł</p>
          </div>
        </div>
        <a href="#" class="nav__item link link-animation wine">Wina</a>
        <div class="nav__dropdown nav__dropdown--two">
          <div class="nav__dropdown--left">
            <a href="" class="link link-animation">Wytrawne</a>
            <a href="" class="link link-animation">Słodkie</a>
            <a href="" class="link link-animation">Półsłodkie</a>
            <a href="" class="link link-animation">Musujące</a>
          </div>
          <div class="nav__dropdown--right">
            <img src="./img/placeholder_image.jpg" alt="">
            <p>Lorem ipsum, quia dol</p>
            <p>150zł</p>
          </div>
        </div>
        <a href="#" class="nav__item link link-animation beer">Piwa</a>
        <div class="nav__dropdown nav__dropdown--three">
          <div class="nav__dropdown--left">
            <a href="" class="link link-animation">IPA</a>
            <a href="" class="link link-animation">ALE</a>
            <a href="" class="link link-animation">Lager</a>
            <a href="" class="link link-animation">Stout</a>
            <a href="" class="link link-animation">Pilzner</a>
          </div>
          <div class="nav__dropdown--right">
            <img src="./img/placeholder_image.jpg" alt="">
            <p>Lorem ipsum, quia dol</p>
            <p>150zł</p>
          </div>
        </div>
        <a href="#" class="nav__item link link-animation courses">Kursy</a>
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
        <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
          <a href="./html/user_panel/" class="nav__user--cart login-btn">
          <i class="fa-solid fa-user"></i>
          <p>Twoje konto</p>
          </a>
          <a href="./php/logout.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p>Wyloguj się</p></a> 
        <?php else: ?>
          <a href="./html/login_page.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-right-to-bracket"></i>
          <p>Zaloguj się</p></a>
        <?php endif; ?>
      </div>
    </nav>
    <script src="./js/index.js"></script>
  </body>
</html>
