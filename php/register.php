<?php
    require_once('dblogin.php');
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
    
    function cleanData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = cleanData($_POST['name']);
    $lastname = cleanData($_POST['lastname']);
    $email = cleanData($_POST['email']);
    $login = cleanData($_POST['login']);
    $password = password_hash(cleanData($_POST['password']), PASSWORD_DEFAULT);
    $phone_code = cleanData($_POST['phone_code']);
    $phone = cleanData($_POST['phone']);
    $address = cleanData($_POST['address']);
    $postcode = cleanData($_POST['postcode']);
    $city = cleanData($_POST['city']);
    $country = cleanData($_POST['country']);

    $stmt = $pdo -> query('Select login from user where login like "'.$login.'";');
    if($stmt -> rowCount() > 0){
        echo 'Podany login jest już zajęty';
    }else{
        $country_id = $pdo -> query('select id from country where country like "'.$country.'";') -> fetchColumn();
        $sql = 'insert into address(country_id, city, postal, address) values(?, ?, ?, ?);';
        $pdo -> prepare($sql) -> execute([$country_id, $city, $postcode, $address]);
        $address_id = $pdo -> query('select id from address where address like "'.$address.'";') -> fetchColumn();
        $sql = 'Insert into user(mail, login, pass, firstname, lastname, address_id, country_tel_code, telephone, isAdmin) values(?, ?, ?, ?, ?, ?, ?, ?, 0)';
        $pdo -> prepare($sql) -> execute([$email, $login, $password, $name, $lastname, $address_id, $phone_code, $phone]);
        echo "success";
    }
?>