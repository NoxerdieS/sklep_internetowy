<?php

    require_once("../dblogin.php");
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $path = "../../img/".$_POST["name"]."_img.png";
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    $sql = 'insert into photos(path) values(?)';
    $pdo -> prepare($sql) -> execute([$path]);
    $photo_id = $pdo -> lastInsertId();

    $sql = 'insert into product(product_name, price, description, stock, photo_id) values(?, ?, ?, ?, ?)';
    $pdo -> prepare($sql) -> execute([$_POST["name"], $_POST["price"], $_POST["description"], $_POST["quantity"], $photo_id]);
    
    $product_id = $pdo -> lastInsertId();
    $sql = 'insert into `product-category`(product_id, category_id) values(?, ?)';
    $pdo -> prepare($sql) -> execute([$product_id, $_POST["category"]]);
