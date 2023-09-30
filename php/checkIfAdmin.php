<?php
    require_once('dblogin.php');
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
    session_start();
    if($_SESSION['loggedIn']){
        $isAdmin = $pdo -> query('select isAdmin from user where login = "'.$_SESSION['login'].'";') -> fetchColumn();
        if(empty($isAdmin)){
            header('HTTP/1.0 403 Forbidden');
            die('You are not allowed to access this file.'); 
        }else{
            echo $_SESSION['login'];
        }
    }else{
        header('HTTP/1.0 403 Forbidden');
        die('You are not allowed to access this file.'); 
    }
?>