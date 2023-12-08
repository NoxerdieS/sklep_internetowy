<?php
    session_start();
    $shipping = $_POST['delivery'];
    $payment = $_POST['payment'];
    $cart = $_SESSION['cart'];

    $sql = 'insert into order_details(total, payment_id, shipping_id) values(?, ?, ?)';
    require_once('./dblogin.php');
    $stmt = $pdo -> prepare($sql);
    
    $total = $_POST['total'];
    $stmt -> execute([$total, $payment, $shipping]);
    $order_id = $pdo -> lastInsertId();
    $sql = 'insert into order_product(order_id, product_id, quantity) values(?, ?, ?)';
    $stmt = $pdo -> prepare($sql);

    for($i=0; $i < count($cart); $i++){
        $stmt -> execute([$order_id, $cart[$i][0], $cart[$i][1]]);
    }
    $address_id = $invoice_address_id = 0;
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
        $sql = 'insert into user_order(user_id, order_id) values(?, ?)';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_POST['user_id'], $order_id]);
        $address_id = $_POST['address_id'];
    }else{
        $sql = 'insert into address(city, postal, address) values(?, ?, ?)';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_POST['city'], $_POST['postcode'], $_POST['address']]);
        $address_id = $pdo -> lastInsertId();
    }
    if($_POST['invoice'] == 1 && [$_POST['city'], $_POST['postcode'], $_POST['address']] != [$_POST['invoice_city'], $_POST['invoice_postcode'], $_POST['invoice_address']]){
        $sql = 'insert into address(city, postal, address) values(?, ?, ?)';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_POST['invoice_city'], $_POST['invoice_postcode'], $_POST['invoice_address']]);
        $invoice_address_id = $pdo -> lastInsertId();
    }else{
        $invoice_address_id = $address_id;
    }
    $sql = 'insert into order_data(firstname, lastname, mail, telephone, address_id, order_id, invoice_name, invoice_mail, invoice_telephone, invoice_address_id) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $pdo -> prepare($sql);
    $name = $_POST['name'];
    $name = explode(' ', $name);
    $firstname = $name[0];
    $lastname = end($name);
    unset($name);
    $invoice_name = $_POST['invoice_name'] ?? $_POST['name'];
    $invoice_mail = $_POST['invoice_email'] ?? $_POST['email'];
    $invoice_phone = $_POST['invoice_phone'] ?? $_POST['phone'];
    $stmt -> execute([$firstname, $lastname, $_POST['email'], $_POST['phone'], $address_id, $order_id, $invoice_name, $invoice_mail, $invoice_phone, $invoice_address_id]);


    $_SESSION['cart'] = [];
?>