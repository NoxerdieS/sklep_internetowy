<?php
    require_once('dblogin.php');
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
    session_start();
    if($_SESSION['loggedIn']){
        $login = $pdo -> query('select login from user where login = "'.$_SESSION['login'].'";') -> fetchColumn();
        if(empty($login)){
            echo 0;
        }else{
            echo $login;
        }
    }else{
        echo 0;
    }
?>