<?php
    require_once('dblogin.php');
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);

    $email = $_POST['email'];
    $activationHash = $_POST['activationHash'];
    $password = $_POST['password'];

    $key = $pdo -> query('select activationHash from user where email like "'.$email.'";') -> fetchColumn();

    if(empty($key) || $activationHash != $key){
        header('Location: ../index.html');
    }else{
        $pdo -> query('update user set pass = "'.$password.'" where email like "'.$email.';');
        header('Location: ../html/login_page.html');
    }
?>