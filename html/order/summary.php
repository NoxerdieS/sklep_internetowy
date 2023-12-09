<?php
  include '../menu_component.php';
  // if(!isset($_SESSION['cart'])){
  //   header('Location: ./cart.php');
  // }
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../../img/logo_transparent.png"
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
      $sql = 'select order_details.id, total, payment_name, shipper_name from order_details inner join payment on order_details.payment_id=payment.id inner join shipping on order_details.shipping_id=shipping.id where order_details.id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$_POST['order_id']]);
    $order_info = $query -> fetch();
    
    $sql = 'select firstname, lastname, mail, telephone, address_id, order_id, invoice_name, invoice_mail, invoice_telephone, invoice_address_id from order_data where order_id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$_POST['order_id']]);
    $user_info = $query -> fetch();
    $sql = 'select city, postal, address from address where id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$user_info['address_id']]);
    $address_info = $query -> fetch();

    $query -> execute([$user_info['invoice_address_id']]);
    $invoice_address_info = $query -> fetch();
    ?>
    <main class="cart summary">
        <h2>Dziękujemy za złożenie zamówienia!</h2>
        <h3>Potwierdzenie zostało wysłane na adres e-mail</h3>
        <div class="order__delivery summary__infoBox">
            <h3>Dane do wysyłki</h3>
            <p><span>Imię i nazwisko: </span><?=$user_info['firstname'].' '.$user_info['lastname']?></p>
            <p><span>Ulica i numer domu / mieszkania: </span><?=$address_info['address']?></p>
            <p><span>Kod pocztowy: </span><?=$address_info['postal']?></p>
            <p><span>Miejscowość: </span><?=$address_info['city']?></p>
            <p><span>Numer telefonu: </span><?=$user_info['telephone']?></p>
            <p><span>Adres e-mail: </span><?=$user_info['mail']?></p>
        </div>
        <div class="order__delivery summary__infoBox">
            <h3>Dane do faktury</h3>
            <p><span>Imię i nazwisko: </span><?=$user_info['invoice_name']?></p>
            <p><span>Ulica i numer domu / mieszkania: </span><?=$invoice_address_info['address']?></p>
            <p><span>Kod pocztowy: </span><?=$invoice_address_info['postal']?></p>
            <p><span>Miejscowość: </span><?=$invoice_address_info['city']?></p>
            <p><span>Numer telefonu: </span><?=$user_info['invoice_telephone']?></p>
            <p><span>Adres e-mail: </span><?=$user_info['invoice_mail']?></p>
        </div>
        <div class="order__delivery summary__infoBox">
            <h3>Płatność i dostawa</h3>
            <p><span>Koszt: </span><?=$order_info['total']?></p>
            <p><span>Sposób dostawy: </span><?=$order_info['shipper_name']?></p>
            <p><span>Płatność: </span><?=$order_info['payment_name']?></p>
        </div>
        <a href="../../index.php" class="linkButton summary__backButton"><i class="ti ti-chevron-left"></i>Wróć na stronę główną</a>
    </main>
    <footer class="text-light py-4 text-center">
		  <p class="mb-0"> &copy; 2023 | Sunrise</p>
	  </footer>
    <script src="../../js/order.js"></script>
  </body>
</html>
