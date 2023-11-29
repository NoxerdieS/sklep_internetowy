<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../img/logo_transparent.png"
      type="image/x-icon"
    />

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
  <?php
      include './menu_component.php';
      echo $nav
    ?>
    <main class="productCategories">
      <?php
      include './product_filter.php';
      echo $filters;
    ?>
      <section class="products__right">
          <div class="products__sortSection">
            <p class="products__sortSection--p">Sortowanie:</p>
            <select name="sort" id="sort" class="products__sortSection--select">
                <option value="Od najtańszych">Od najtańszych</option>
                <option value="Od najdroższych">Od najdroższych</option>
                <option value="Po nazwie rosnąco">Po nazwie rosnąco</option>
                <option value="Po nazwie malejąco">Po nazwie malejąco</option>
            </select>
        </div>
        <div class="products__productContainer">
          <a class="products__product">
            <img src="../../img/placeholder_image.jpg" alt="IPA" class="products__product--image">
            <p class="products__product--name">Jack Daniels</p>
            <p class="products__product--price">100 zł</p>
            <button class="products__product--addToCart">Dodaj do koszyka</button>
          </a>
        </div>
      </section>
    </main>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/filter.js"></script>
  </body>
</html>
