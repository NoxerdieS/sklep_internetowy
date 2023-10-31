<?php
session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
 header('Location: ../../index.php');
}
require_once('../../php/dblogin.php');
$product = $_GET['item'];
$sql = 'select id, product_name, price, description, stock, photo_id from product where product_name like ?';
$product_info = $pdo ->prepare($sql);
$product_info -> execute([$product]);
$product_info = $product_info -> fetch();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../img/logo_transparent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/bec5797acb.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Panel administratora</title>
  </head>
<div class="admin__contentContainer">
        <a href="./index.php" class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></a>
        <form id="create-product-form" method="post" action="../../php/admin_panel/edit_product.php?id=<?=$product_info['id']?>" enctype="multipart/form-data">
            <div class="admin__formContainer">
            <label for="name">Nazwa produktu:</label>
            <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa produktu" value="<?=$product_info['product_name']?>">
            </div>
            <div class="admin__formContainer">
            <label for="category">Wybierz kategorię:</label>
            <?php
                $category = $pdo -> query('select category.id, category_name from category inner join product on category.id = product.category_id where product_name like "'.$product.'"') ->fetch();
            ?>
            <select type="text" name="category" id="category" class="admin__contentContainer--input" placeholder="Kategoria" selected="<?=$category?>">
                <option selected value="<?=$category['id']?>"><?=$category['category_name']?></option>
                <?php foreach($pdo -> query('select id, category_name from category;') as $row): ?>
                    <option value="<?=$row["id"]?>"><?=$row["category_name"]?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="admin__formContainer">      
            <label for="price">Cena:</label>
            <input type="text" name="price" id="price" class="admin__contentContainer--input" placeholder="Cena" value="<?=$product_info['price']?>">
            </div>

            <div class="admin__formContainer">
            <label for="description">Opis produktu:</label>
            <textarea name="description" id="description" class="admin__contentContainer--textarea" placeholder="Opis" wrap="hard" ><?=$product_info['description']?></textarea>
            </div>

            <div class="admin__formContainer">
            <label for="quantity">Ilość:</label>
            <input type="number" name="quantity" id="quantity" class="admin__contentContainer--input" placeholder="Ilość" value="<?=$product_info['stock']?>">
            </div>

            <div class="admin__formContainer">
            <label for="image">Zdjęcie produktu:</label>
            <input type="file" name="image" id="image" class="admin__contentContainer--file">
            <?php
              $sql = 'select path from photos where id like ?';
              $img_path = $pdo ->prepare($sql);
              $img_path -> execute([$product_info['photo_id']]);
              $img_path = $img_path -> fetchColumn(); 
            ?>
            <img src="<?=$img_path?>" alt="" class="admin__product--img">
            </div>
            <button type="submit" class="admin__contentContainer--addProduct">Zatwierdź</button>
        </form>
</div>
</html>