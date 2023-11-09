<?php
ob_start();
?>
<h1 class="admin__headline">Sposoby dostawy</h1>
<div class="admin__add">
        <a href="./add_info_page.php" class="admin__add--addBtn">Dodaj</a>
        <div class="nav__user--search admin__add--search">
          <input type="text" placeholder="Wyszukaj..." id="searchBar"/><i id="searchBtn" class="fa-solid fa-magnifying-glass"></i>
        </div>
</div>
<div class="admin__products">
<?php
require_once("../../php/dblogin.php");
$sql = 'select id, name, path from info_pages';
$query = $pdo ->prepare($sql);
$query ->execute();
while ($row = $query->fetch()){
    $param = http_build_query([
      'item' => $row['name']
    ]);
    $delParams = http_build_query([
      'item' => $row['name'],
      'table' => 'info_pages',
      'column' => 'name'
    ]);
    $html = '<div class="admin__product">
    <p class="admin__product--name">'.$row['name'].'</p>
    <a href="./add_page.php?'.$param.'" class="admin__add--addBtn">Edytuj</a>
    <a href="../../php/admin_panel/delete_item.php?'.$delParams.'" class="admin__add--addBtn">Usuń</a>
    </div>';
    echo $html;
}
?>
</div>
<?php

$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";