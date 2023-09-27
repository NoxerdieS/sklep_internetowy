<?php
    require_once('dblogin.php');
    session_start();
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
    function cleanData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $login = cleanData($_POST['login']);
    $password = cleanData($_POST['password']);

    $key = $pdo -> query('select pass from user where login like "'.$login.'";') -> fetchColumn();
    if(empty($key)){
        $_SESSION['loggedIn'] = false;
        echo 0;
    }else if(password_verify($password, $key)){
        $_SESSION['loggedIn'] = true;
        echo 1;
    }else{
        $_SESSION['loggedIn'] = false;
        echo 0;
    }
?>