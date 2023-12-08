<?php
    session_start();
    require_once('../../php/dblogin.php');

    $sql = 'select order_details.id, total, payment_name, shipper_name from order_details inner join payment on order_details.payment_id=payment.id inner join shipping on order_details.shipping_id=shipping.id where order_details.id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$_GET['id']]);
    $order_info = $query -> fetch();
    
    $sql = 'select firstname, lastname, mail, telephone, address_id, order_id, invoice_name, invoice_mail, invoice_telephone, invoice_address_id from order_data where order_id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$_GET['id']]);
    $user_info = $query -> fetch();
    $sql = 'select city, postal, address from address where id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$user_info['address_id']]);
    $address_info = $query -> fetch();

    $query -> execute([$user_info['invoice_address_id']]);
    $invoice_address_info = $query -> fetch();
    ob_start();
?>

<form class="admin__contentContainer--userForm">
    <div class="admin__formContainer">
                      <label for="name">Numer zamówienia:</label>
                      <input type="text" name="order_id" id="order_id" class="admin__contentContainer--input" placeholder="Numer zamówienia" value="<?=$order_info['id']?>" disabled>
                  </div>              
    <div class="admin__formContainer">
                      <label for="name">Wartość zamówienia</label>
                      <input type="text" name="total" id="total" class="admin__contentContainer--input" placeholder="Wartość zamówienia" value="<?=$order_info['total']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Sposób dostawy:</label>
                      <input type="text" name="shipping" id="shipping" class="admin__contentContainer--input" placeholder="Sposób dostawy" value="<?=$order_info['shipper_name']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Sposób płatności:</label>
                      <input type="text" name="payment" id="payment" class="admin__contentContainer--input" placeholder="Sposób płatności" value="<?=$order_info['payment_name']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Imię:</label>
                      <input type="text" name="firstname" id="firstname" class="admin__contentContainer--input" placeholder="Imię" value="<?=$user_info['firstname']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Nazwisko:</label>
                      <input type="text" name="lastname" id="lastname" class="admin__contentContainer--input" placeholder="Nazwisko" value="<?=$user_info['lastname']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">E-mail:</label>
                      <input type="email" name="email" id="email" class="admin__contentContainer--input" placeholder="Email" value="<?=$user_info['mail']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Telefon:</label>
                      <input type="number" name="phone" id="phone" class="admin__contentContainer--input" placeholder="Telefon" value="<?=$user_info['telephone']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Ulica i numer:</label>
                      <input type="text" name="address" id="address" class="admin__contentContainer--input" placeholder="Ulica i numer" value="<?=$address_info['address']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Kod pocztowy:</label>
                      <input type="text" name="postcode" id="postcode" class="admin__contentContainer--input" placeholder="Kod pocztowy" value="<?=$address_info['postal']?>" disabled>
                  </div>
                  <div class="admin__formContainer">
                      <label for="name">Miasto:</label>
                      <input type="text" name="city" id="city" class="admin__contentContainer--input" placeholder="Miasto" value="<?=$address_info['city']?>" disabled>
                  </div>
</form>
<?php
$details = ob_get_contents();
ob_end_clean();
echo $details;