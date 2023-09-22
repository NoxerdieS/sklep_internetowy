<?php
require_once('dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
$login = $_POST['login'];
$input_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$stmt = $pdo -> query('Select pass from user where login like "'.$login.'";');
$password = $stmt -> fetch();

if ($input_password == $password){
    echo 1;
}else{
    echo 0;
}

?>