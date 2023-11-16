<?php
//session_start();
//if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']){
//  header('Location: ../index.php');
//}
?>

<?php
ob_start();
?>
<h1 class="admin__headline">Zwroty i reklamacje</h1>
<div class="admin__products">
<?php
// $sql = 'select order_details.id, login from order_details inner join user on user.id=order_details.user_id';
// $query = $pdo->prepare($sql);
// $query -> execute();
// while ($row = $query->fetch()){
//     $param = http_build_query([
//         'item' => $row['id']
//     ]);
//     $delParams = http_build_query([
//         'item' => $row['id'],
//         'table' => 'order_details',
//         'column' => 'id'
//     ]);
//     $html = '<div class="admin__product">
//     <p class="admin__product--name">Nr: '.$row['id'].', User: '.$row['login'].'</p>
//     <a href="./edit_order.php?'.$param.'" class="admin__add--addBtn admin__product--edit">Edytuj</a>
//     <a href="../../php/admin_panel/delete_item.php?'.$delParams.'" class="admin__add--addBtn admin__product--delete">Usuń</a>
//     </div>';
//     echo $html;
// }
?>
<?php
$body = ob_get_contents();
ob_end_clean();


require('./user_panel.php');
