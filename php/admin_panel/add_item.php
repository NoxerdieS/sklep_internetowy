<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
     header('Location: ../../index.php');
    }
    require_once("../dblogin.php");
    if(isset($_GET['file'])){
        $file = $_GET['file'];
        if($file == "index"){
        $path = "../../img/".$_POST["name"]."_img.png";
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $sql = 'insert into photos(path) values(?)';
        $pdo -> prepare($sql) -> execute([$path]);
        $photo_id = $pdo -> lastInsertId();
    
        $sql = 'insert into product(product_name, category_id, price, description, stock, photo_id) values(?, ?, ?, ?, ?, ?)';
        $pdo -> prepare($sql) -> execute([$_POST["name"], $_POST["category"], $_POST["price"], $_POST["description"], $_POST["quantity"], $photo_id]);
        }else if ($file == "categories"){
            $sql = 'insert into category(category_name) values(?)';
            $pdo -> prepare($sql) -> execute([$_POST['name']]);
        }else if($file == 'payment'){
            $sql = 'insert into payment(payment_name, payment_cost, isActive) values(?, ?, 1)';
            $pdo -> prepare($sql) -> execute([$_POST['name'], $_POST['cost']/100]);
            
        }else if($file == 'shipping'){
            $sql = 'insert into shipping(shipper_name, shipping_cost, isActive) values(?, ?, 1)';
            $pdo -> prepare($sql) -> execute([$_POST['name'], $_POST['cost']/100]);
        }else if($file == 'customers'){
            if($_POST['password'] == $_POST['password2']){
                $sql = 'insert into address(city, postal, address) values(?, ?, ?)';
                $pdo -> prepare($sql) -> execute([$_POST['city'], $_POST['postcode'], $_POST['address']]);
                $address_id = $pdo -> lastInsertId();

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                $sql = 'insert into user(mail, login, pass, firstname, lastname, address_id, telephone, isAdmin, isActive)
                values(?, ?, ?, ?, ?, ?, ?, ?, ?)';
                $pdo -> prepare($sql) -> execute([$_POST['email'], $_POST['login'], $password, $_POST['firstname'], $_POST['lastname'], $address_id, $_POST['phone'], $_POST['isAdmin'], $_POST['isActive']]);
            }

        }
    }
    