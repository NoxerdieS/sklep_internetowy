<?php
ob_start();
?>
<section class="products__left">
    <div class="products__filtersContainer">
          <h2 class="products__left--headline">Filtry</h2>
<?php
require_once('../../php/dblogin.php');
$sql = 'select distinct(param_name) from `product-params` inner join parameters on `product-params`.param_id = parameters.id';
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
while($paramRow = $stmt -> fetchColumn()):
?>
          <h3 class="products__left--headline2"><?=$paramRow?></h3>
          <?php
            $sql = 'select distinct(param_value) from `product-params` inner join parameters on `product-params`.param_id = parameters.id where param_name like ?';
            $query = $pdo -> prepare($sql);
            $query -> execute([$paramRow]);
            while($row = $query -> fetch()):
          ?>
          <div class="products__left--optionBox">
            <label for="<?=$row['param_value']?>">
              <input type="checkbox" name="type" id="<?=$row['param_value']?>">
              <?=$row['param_value']?>
          </label>
          </div>
          <?php endwhile;?>
          <?php endwhile;?>
          <h3 class="products__left--headline2">Cena</h3>
          <div class="products__left--priceAdjust">
              <input type="number" id="minPrice" placeholder="od">
              <hr>
              <input type="number" id="maxPrice" placeholder="do">
          </div>
          <button class="button">Zatwierdź</button>
        </div>
        </section>
<?php
$filters = ob_get_contents();
ob_end_clean()
?>