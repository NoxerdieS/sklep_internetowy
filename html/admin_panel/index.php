<?php

ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);

$query = $pdo -> query('select product_name, path from product inner join photos on product.photo_id=photos.id;');
$html = '<div class="admin__products">';
while ($row = $query->fetch()){
    
    $html .= '<div class="admin__product">
    <img src="'.$row['path'].'" alt="" class="admin__product--img">
    <p class="admin__product--name">'.$row['product_name'].'</p>
    <button class="admin__add--addBtn admin__product--edit">Edytuj</button>
    <button class="admin__add--addBtn admin__product--delete">Usuń</button>
    </div>';
}
$html .= '</div>';
echo $html;


$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";