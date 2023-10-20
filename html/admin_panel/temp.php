<?php
//session_start();
//if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']){
//  header('Location: ../index.php');
//}

ob_start();
?>

<p>Hello world</p>

<?php

$body=ob_get_contents(); 
ob_end_clean();

require "./template.php";