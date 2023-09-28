<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'vendor/autoload.php';

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

    $stmt = $pdo -> query('Select login from user where login like "'.$login.'";');
    if($stmt -> rowCount() > 0){
        echo 'Podany login jest już zajęty';
    }else{
        $sql = 'insert into address(city, postal, address) values(?, ?, ?);';
        $pdo -> prepare($sql) -> execute([$city, $postcode, $address]);
        $address_id = $pdo -> query('select id from address where address like "'.$address.'";') -> fetchColumn();
        $sql = 'Insert into user(mail, login, pass, firstname, lastname, address_id, telephone, isAdmin) values(?, ?, ?, ?, ?, ?, ?, 0)';
        $pdo -> prepare($sql) -> execute([$email, $login, $password, $name, $lastname, $address_id, $phone]);
        $mail -> SMTPDebug = SMTP::DEBUG_SERVER;
        $mail -> isSMTP();
        $mail -> Host = 'jseroka08@gmail.com';
        $mail -> SMTPAuth = true;
        $mail->Username   = 'jseroka08@gmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;    
        echo "success";
    }
?>