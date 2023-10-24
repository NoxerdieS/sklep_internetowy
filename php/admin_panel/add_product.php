<?php
    var_dump($_POST);
    require_once("../dblogin.php");
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'insert into product(product_name, price, description, stock, photo_id) values(?, ?, ?, ?, 1)';
    $pdo -> prepare($sql) -> execute([$_POST["name"], $_POST["price"], $_POST["description"], $_POST["quantity"]]);
    $product_id = $pdo -> lastInsertId();
    $sql = 'insert into `product-category`(product_id, category_id) values(?, ?)';
    $pdo -> prepare($sql) -> execute([$product_id, $_POST["category"]]);
    // $sql = 'insert into photos(path) values(?)';
    // $pdo -> prepare($sql) -> execute([$_POST["image"]]);