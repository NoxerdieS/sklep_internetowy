<?php
    require_once('dblogin.php');
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
        echo 'Podany użytkownik nie istnieje';
    }else if(password_verify($password, $key)){
        echo 'success';
    }else{
        echo 'fail';
    }
?>