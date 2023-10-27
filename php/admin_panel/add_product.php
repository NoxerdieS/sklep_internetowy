<?php
    require_once("../dblogin.php");
    
    $path = "../../img/".$_POST["name"]."_img.png";
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    $sql = 'insert into photos(path) values(?)';
    $pdo -> prepare($sql) -> execute([$path]);
    $photo_id = $pdo -> lastInsertId();

    $sql = 'insert into product(product_name, category_id, price, description, stock, photo_id) values(?, ?, ?, ?, ?, ?)';
    $pdo -> prepare($sql) -> execute([$_POST["name"], $_POST["category"], $_POST["price"], $_POST["description"], $_POST["quantity"], $photo_id]);