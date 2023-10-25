<?php
session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
 header('Location: ../../index.php');
}
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
      <a href="../../index.php" class="nav__item--logo"></a>
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
          <img src="../../img/placeholder_image.jpg" alt="">
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
          <img src="../../img/placeholder_image.jpg" alt="">
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
          <img src="../../img/placeholder_image.jpg" alt="">
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
        <a href="../user_panel/user_panel.php" class="nav__user--cart login-btn">
        <i class="fa-solid fa-user"></i>
        <p>Twoje konto</p>
        </a>
        <a href="../../php/logout.php" class="nav__user--cart login-btn">
        <i class="fa-solid fa-right-from-bracket"></i>
        <p>Wyloguj się</p></a> 
    </div>
  </nav>
  <div class="admin__popup--shadow"></div>
  <main class="user admin">
    <section class="user__menu admin__menu">
      <a href="./index.php" class="user__menu--item admin__menu--item link link-animation-two">Zarządzanie produktami</a>
      <a href="./categories.php" class="user__menu--item admin__menu--item link link-animation-two">Zarządzanie kategoriami</a>
      <a href="./customers.php" class="user__menu--item admin__menu--item link link-animation-two">Zarządzanie klientami</a>
      <a href="./orders.php" class="user__menu--item admin__menu--item link link-animation-two">Zamówienia użytkowników</a>
      <a href="./shipping.php" class="user__menu--item admin__menu--item link link-animation-two">Ustawienia dostawy</a>
      <a href="./payment.php" class="user__menu--item admin__menu--item link link-animation-two">Ustawienia płatności</a>
      <a href="./info_editor.php" class="user__menu--item admin__menu--item link link-animation-two">Edytuj strony informacyjne</a>
    </section>
    <section class="user__section admin__section">
      <div class="admin__add">
        <button class="admin__add--addBtn">Dodaj</button>
        <div class="nav__user--search admin__add--search">
          <input type="text" placeholder="Wyszukaj..." /><i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <?=$body?>
    </section>
    <div class="admin__popup">
      <form class="admin__contentContainer" id="create-product-form" method="post">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <!-- <div class="admin__formContainer"> -->
          <div class="admin__formContainer">
            <label for="name">Nazwa produktu:</label>
            <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa produktu">
          </div>

          <div class="admin__formContainer">
            <label for="category">Wybierz kategorię:</label>
            <select type="text" name="category" id="category" class="admin__contentContainer--input" placeholder="Kategoria">
              <?php
                $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                foreach($pdo -> query('select id, category_name from category;') as $row){
                  echo '<option value="'.$row["id"].'"]>'.$row["category_name"].'</option>';
                }
              ?>
            </select>
          </div>

          <div class="admin__formContainer">      
            <label for="price">Cena:</label>
            <input type="text" name="price" id="price" class="admin__contentContainer--input" placeholder="Cena">
          </div>

          <div class="admin__formContainer">
            <label for="description">Opis produktu:</label>
            <textarea name="description" id="description" class="admin__contentContainer--textarea" name="category" id="category" placeholder="Opis" wrap="hard"></textarea>
          </div>

          <div class="admin__formContainer">
            <label for="quantity">Ilość:</label>
            <input type="number" name="quantity" id="quantity" class="admin__contentContainer--input" placeholder="Ilość">
          </div>

          <div class="admin__formContainer">
            <label for="image">Zdjęcia produktu:</label>
            <input type="file" name="image" id="image" class="admin__contentContainer--file">
          </div>
        <!-- </div> -->
        <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
      </form>
    </div>
  </main>
      
  <script>
    
  </script>
  <script src="../../js/admin_panel.js"></script>
</body>
</html>
