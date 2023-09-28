<?php
    require_once('dblogin.php');
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
   
    $login = $_GET['login'];
    $activationHash = $_GET['activationHash'];

    $userInfo = $pdo -> query('select login, activationHash from user where login like "'.$login.'";') -> fetch();
    if(empty($userInfo) || $userInfo['activationHash'] == ""){
        header('../html/register.html');
    }else if($userInfo['login'] == $login && $userInfo['activationHash'] == $activationHash){
            $sql = 'update user set isActive = true where login like ?;';
            $pdo -> prepare($sql) -> execute([$login]);
    }
    header('http://localhost/sklep_internetowy/index.html');
?>