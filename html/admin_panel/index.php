<?php

ob_start();
require_once('../../php/dblogin.php');

$query = $pdo -> query('select product_name, path from product inner join photos on product.photo_id=photos.id;');
$html = '<div class="admin__products">';

while ($row = $query->fetch()){
    $param = http_build_query([
        'item' => $row['product_name']
    ]);

    $html .= '<div class="admin__product">
    <img src="'.$row['path'].'" alt="" class="admin__product--img">
    <p class="admin__product--name">'.$row['product_name'].'</p>
    <a href="./edit_product.php?'.$param.'" class="admin__add--addBtn admin__product--edit">Edytuj</a>
    <button class="admin__add--addBtn admin__product--delete">Usuń</button>
    </div>';
}
$html .= '</div>';
echo $html;
?>
<div class="admin__popup">
      <div class="admin__contentContainer">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form id="create-product-form" method="post">
            <div class="admin__formContainer">
            <label for="name">Nazwa produktu:</label>
            <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa produktu">
            </div>

            <div class="admin__formContainer">
            <label for="category">Wybierz kategorię:</label>
            <select type="text" name="category" id="category" class="admin__contentContainer--input" placeholder="Kategoria">
                <?php foreach($pdo -> query('select id, category_name from category;') as $row): ?>
                    <option value="<?=$row["id"]?>"><?=$row["category_name"]?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="admin__formContainer">      
            <label for="price">Cena:</label>
            <input type="text" name="price" id="price" class="admin__contentContainer--input" placeholder="Cena">
            </div>

            <div class="admin__formContainer">
            <label for="description">Opis produktu:</label>
            <textarea name="description" id="description" class="admin__contentContainer--textarea" name="category" id="category" placeholder="Opis" wrap="hard"></textarea>
            </div>

            <div class="admin__formContainer">
            <label for="quantity">Ilość:</label>
            <input type="number" name="quantity" id="quantity" class="admin__contentContainer--input" placeholder="Ilość">
            </div>

            <div class="admin__formContainer">
            <label for="image">Zdjęcia produktu:</label>
            <input type="file" name="image" id="image" class="admin__contentContainer--file">
            </div>
            <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
          </form>
      </div>
    </div>

<?php

$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";