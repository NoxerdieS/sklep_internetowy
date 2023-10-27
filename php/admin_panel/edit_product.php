<?php
    require_once '../dblogin.php';
    $id = $_GET['id'];
    $name = $_POST['name'];
    $category= $_POST['category'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $stock = $_POST['quantity'];

    $path = "../../img/".$name."_img.png";
    move_uploaded_file($_FILES['image']['tmp_name'], $path);

    $sql = 'update product set product_name = ?, category_id = ?, price = ?, description = ?, stock = ? where id = ?';
    $stmt = $pdo -> prepare($sql);
    $succes = $stmt -> execute([$name, $category, $price, $desc, $stock, $id]);
    // $sql = 'update photos set path = ? where id =';
    if ($succes) {
        header('Location: ../../html/admin_panel/index.php');
    }else {
        $param = http_build_query([
            'item' => $name
        ]);
        header('Location :../../html/admin_panel/edit_product.php?'. $param);
    }

