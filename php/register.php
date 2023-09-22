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
        $stmt = $pdo -> query('insert into address(country_id, city, postal, address) values('.$country_id.', "'.$city.'", "'.$postcode.'", "'.$address.'";');
        $address_id = $pdo -> query('select id from country where address like "'.$address.'";') -> fetchColumn();
        $stmt = $pdo -> query('Insert into user(mail, login, pass, firstname, lastname, address_id, country_tel_code, telephone, isAdmin) 
        values("'.$email.'", "'.$login.'", "'.$password.'", "'.$name.'", "'.$lastname.'", '.$address_id.', "+48", '.$phone.', 0)');
        echo "success";
    }
?>