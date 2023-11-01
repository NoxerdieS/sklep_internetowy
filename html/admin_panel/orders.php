<?php

ob_start();

// while ($row = $query->fetch()){
//     $html = '<div class="admin__product">
//     <img src="'.$row['path'].'" alt="" class="admin__product--img">
//     <p class="admin__product--name">'.$row['product_name'].'</p>
//     <a class="admin__add--addBtn admin__product--edit">Edytuj</a>
//     <button class="admin__add--addBtn admin__product--delete">Anuluj</button>
//     </div>';
//     echo $html;
// }

$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";