<?php
ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
?>
<div class="admin__add">
        <button class="admin__add--addBtn">Dodaj</button>
        <div class="nav__user--search admin__add--search">
          <input type="text" placeholder="Wyszukaj..." id="searchBar"/><i id="searchBtn" class="fa-solid fa-magnifying-glass"></i>
        </div>
</div>
<div class="admin__products">
<?php
// $query = $pdo -> query('select category_name from category;');
// while ($row = $query->fetch()){
//     $html = '<div class="admin__product admin__payment">
//     <img src="'.$row['path'].'" alt="" class="admin__product--img">
//     <p class="admin__product--name">'.$row['product_name'].'</p>
//     <a class="admin__add--addBtn">Edytuj</a>
//     <button class="admin__add--addBtn">Anuluj</button>
//     <button class="admin__add--addBtn">Wyłącz</button>
//     </div>';
//     echo $html;
// }
?>
    <div class="admin__popup">
      <div class="admin__contentContainer">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form id="create-product-form" method="post">
            <div class="admin__formContainer">
                <label for="name">Nazwa sposobu dostawy:</label>
                <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa sposobu dostawy">
            </div>
            <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
        </form>
      </div>
    </div>
</div>
<?php
$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";