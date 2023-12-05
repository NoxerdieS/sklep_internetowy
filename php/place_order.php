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

    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
        $address_id = $_POST['address_id'];
        $sql = 'insert into user_order(user_id, order_id) values(?, ?)';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$order_id, $_POST['user_id']]);
    }else{
        $sql = 'insert into address(city, postal, address) values(?, ?, ?)';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_POST['city'], $_POST['postcode'], $_POST['address']]);
        $address_id = $pdo -> lastInsertId();
    }

    $sql = 'insert into order_address(order_id, address_id) values(?, ?)';
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$order_id, $address_id]);

    $_SESSION['cart'] = [];
?>