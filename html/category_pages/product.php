<?php
  // session_start();
?>
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
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"
		/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
			rel="stylesheet"
			type="text/css"
			href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
		/>
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
  <?php
      include './menu_component.php';
      echo $nav
    ?>
    <main class="product">
        <div class="product__topSection">
            <div class="product__image">

            </div>
            <div class="product__specs">
                <p class="product__specs--headline">Nazwa produktu</p>
                <div class="product__specs__info">
                    <div class="product__specs__text">
                      <ul>
                        <li><b>Producent:</b> Loerm ipsum</li>
                        <li><b>Rodzaj:</b> Loerm ipsum</li>
                        <li><b>Kraj pochodzenia:</b> Loerm ipsum</li>
                        <li><b>Moc:</b> Loerm ipsum</li>
                      </ul>
                    </div>
                    <div class="product__specs__price">
                      <p class="product__specs__price--price">120 zł</p>
                      <a href="" class="linkButton">Dodaj do koszyka</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__bottomSection">
          <h2 class="product__bottomSection--headline">Lorem ipsum</h2>
          <div class="product__bottomSection--text">
          <i class="fa-solid fa-wine-bottle"></i>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque lorem metus, at semper massa fringilla vel. Nam semper commodo urna, sed laoreet sapien viverra ut. Nulla facilisi. Vivamus non vulputate mauris. Maecenas in aliquam nulla, vitae vehicula massa. Vivamus eu pretium ante, eu porttitor mauris. Nam vitae vestibulum libero. Sed imperdiet magna at libero euismod placerat. Duis faucibus ut tellus ut maximus. Mauris pretium, nunc sit amet cursus sollicitudin, dui lacus mattis nisl, nec rutrum sem tellus vel magna. Phasellus mollis enim nec turpis pellentesque placerat. Cras consectetur fringilla luctus.</p>
          </div>
          <img src="../../img/whisky.png" alt="">

          <div class="wrapper">
            <div class="reviews">
              <div class="reviews__boxes">
                <div class="reviews__box">
                  <div class="reviews__box-img">
                    <img src="../../img/rev1.jpg" alt="Anna Nowak" />
                  </div>
                  <div class="reviews__box-info">
                    <div class="reviews__box-quote">
                      <i class="ti ti-quote"></i>
                    </div>
                    <p class="reviews__box-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit
                      blanditiis nulla, voluptatum natus labore at nostrum eligendi
                      esse sapiente molestias.
                    </p>
                    <strong>Anna Nowak</strong>
                  </div>
                </div>
                <div class="reviews__box">
                  <div class="reviews__box-img">
                    <img src="../../img/rev2.jpg" alt="Jan Nowak" />
                  </div>
                  <div class="reviews__box-info">
                    <div class="reviews__box-quote">
                      <i class="ti ti-quote"></i>
                    </div>
                    <p class="reviews__box-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit
                      blanditiis nulla, voluptatum natus labore at nostrum eligendi
                      esse sapiente molestias.
                    </p>
                    <strong>Jan Nowak</strong>
                  </div>
                </div>
                <div class="reviews__box">
                  <div class="reviews__box-img">
                    <img src="../../img/rev3.jpg" alt="Maria Wiśniewska" />
                  </div>
                  <div class="reviews__box-info">
                    <div class="reviews__box-quote">
                      <i class="ti ti-quote"></i>
                    </div>
                    <p class="reviews__box-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit
                      blanditiis nulla, voluptatum natus labore at nostrum eligendi
                      esse sapiente molestias.
                    </p>
                    <strong>Maria Wiśniewska</strong>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script
			type="text/javascript"
			src="//code.jquery.com/jquery-1.11.0.min.js"
		></script>
		<script
			type="text/javascript"
			src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
		></script>
		<script
			type="text/javascript"
			src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
		></script>
		<script src="../../js/slick.js"></script>
  <script src="../../js/index.js"></script>
  </body>
</html>
