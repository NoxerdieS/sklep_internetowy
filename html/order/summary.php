<?php
  include '../menu_component.php';
  if(!isset($_SESSION['cart'])){
    header('Location: ./cart.php');
  }
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="./img/logo_transparent.png"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <?php
      echo $nav;

      require_once('../../php/dblogin.php');
      $sql;
      if(isset($_SESSION['login'])){
        $sql = 'select address_id from order_address where order_id = ?';
        $sql = 'select city, postal, address from address where id = ?';

        $sql = 'select user.id, firstname, lastname, telephone, mail user where login = ?';

      }
    ?>
    <main class="cart summary">
        <h2>Dziękujemy za złożenie zamówienia!</h2>
        <h3>Potwierdzenie zostało wysłane na adres e-mail</h3>
        <div class="order__delivery summary__infoBox">
            <h3>Dane do wysyłki</h3>
            <p><span>Imię i nazwisko: </span>Jan Kowalski</p>
            <p><span>Ulica i numer domu / mieszkania: </span>Lorem, ipsum dolor.</p>
            <p><span>Kod pocztowy: </span>00-000</p>
            <p><span>Miejscowość: </span>Lorem</p>
            <p><span>Numer telefonu: </span>000000000</p>
            <p><span>Adres e-mail: </span>troll@troll.pl</p>
        </div>
        <div class="order__delivery summary__infoBox">
            <h3>Dane do faktury</h3>
            <p><span>Imię i nazwisko: </span>Jan Kowalski</p>
            <p><span>Ulica i numer domu / mieszkania: </span>Lorem, ipsum dolor.</p>
            <p><span>Kod pocztowy: </span>00-000</p>
            <p><span>Miejscowość: </span>Lorem</p>
            <p><span>Numer telefonu: </span>000000000</p>
            <p><span>Adres e-mail: </span>troll@troll.pl</p>
        </div>
        <div class="order__delivery summary__infoBox">
            <h3>Płatność i dostawa</h3>
            <p><span>Koszt: </span>2137 zł</p>
            <p><span>Sposób dostawy: </span>Inpost</p>
            <p><span>Płatność: </span>BLIK</p>
        </div>
        <a href="../../index.php" class="linkButton summary__backButton"><i class="ti ti-chevron-left"></i>Wróć na stronę główną</a>
    </main>
    <footer class="text-light py-4 text-center">
		  <p class="mb-0"> &copy; 2023 | Sunrise</p>
	  </footer>
    <script src="../../js/order.js"></script>
  </body>
</html>
