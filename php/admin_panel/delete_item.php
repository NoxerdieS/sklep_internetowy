<?php
session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
 header('Location: ../../index.php');
}
if(!empty($_GET)){
    $_SESSION['name'] = $_GET['item'];
    $_SESSION['table'] = $_GET['table'];
    $_SESSION['column'] = $_GET['column'];
}
if(isset($_POST['submit'])){
    require_once('../dblogin.php');
    $photo_id = $address_id = 0;
    if($_SESSION['table'] == "product"){
        $sql = 'select photo_id from product where product_name like ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$_SESSION['name']]);
        $photo_id = $stmt -> fetchColumn();
    }else if($_SESSION['table'] == 'user'){
        $sql = 'select address_id from user where login like ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$_SESSION['name']]);
        $address_id = $stmt -> fetchColumn();
    }
    $sql = 'delete from '.$_SESSION['table'].' where '.$_SESSION['column'].' like ?';
    $stmt = $pdo ->prepare($sql);
    $stmt -> execute([$_SESSION['name']]);
    if($_SESSION['table'] == "product"){
        $sql = 'delete from photos where id = ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$photo_id]);
        header('Location: ../../html/admin_panel/index.php');
    }else if($_SESSION['table'] == 'user'){
        $sql = 'delete from address where id = ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$address_id]);
        header('Location: ../../html/admin_panel/customers.php');
    }
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../img/logo_transparent.png" type="image/x-icon">
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
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Panel administratora</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="admin__formContainer">
            <p class="admin__product--name">Czy na pewno chcesz usunąć tą pozycję?</p>
            <input type="text" name="name" id="name" class="admin__contentContainer--input"  value="<?=$_SESSION['name']?>" readonly>
            <br>
            <input type="submit" name="submit" class="admin__add--addBtn" value="Tak">
        </div>
    </form>
</body>
</html>