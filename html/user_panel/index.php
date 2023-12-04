<?php
ob_start();
require_once('../../php/dblogin.php');
?>
<h1 class="admin__headline">Zamówienia</h1>
<div class="admin__products">
<?php
$sql = 'select order_details.id from order_details inner join user on user.id=order_details.user_id';
$query = $pdo->prepare($sql);
$query -> execute();
while ($row = $query->fetch()){
    $param = http_build_query([
        'item' => $row['id']
    ]);
    $delParams = http_build_query([
        'item' => $row['id'],
        'table' => 'order_details',
        'column' => 'id'
    ]);
    $html = '<div class="admin__product">
    <p class="admin__product--name">Nr: '.$row['id'].'</p>
    <a href="" class="admin__add--addBtn admin__product--delete">Szczegóły</a>
    </div>';
    echo $html;
}
?>
<?php
$body = ob_get_contents();
ob_end_clean();


require('./user_panel.php');
