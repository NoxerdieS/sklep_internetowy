<?php
ob_start();
require_once('../../php/dblogin.php');
?>
<h1 class="admin__headline">Zamówienia</h1>
<div class="admin__products">
<?php
$sql = 'select user_order.order_id from user_order inner join user on user.id=user_order.user_id';
$query = $pdo->prepare($sql);
$query -> execute();
while ($row = $query->fetch()){
    $param = http_build_query([
        'item' => $row['order_id']
    ]);
    $delParams = http_build_query([
        'item' => $row['order_id'],
        'table' => 'user_order',
        'column' => 'order_id'
    ]);
    $html = '<div class="admin__product">
    <p class="admin__product--name">Numer zamówienia: '.$row['order_id'].'</p>
    <a href="" class="admin__add--addBtn admin__product--delete">Szczegóły</a>
    </div>';
    echo $html;
}
?>
<?php
$body = ob_get_contents();
ob_end_clean();


require('./user_panel.php');
