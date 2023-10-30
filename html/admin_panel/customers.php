<?php

ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);

$query = $pdo -> query('select login from user');
while ($row = $query->fetch()){
    $html = '<div class="admin__product">
    <p class="admin__product--name">'.$row['login'].'</p>
    <button class="admin__add--addBtn admin__product--edit">Edytuj dane</button>
    <button class="admin__add--addBtn admin__product--delete">Usuń</button>
    </div>';
    echo $html;
}


$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";