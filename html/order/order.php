
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="./img/logo_transparent.png"
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <?php
      include '../menu_component.php';
      echo $nav
    ?>
    <main class="cart order">
      <section class="order__left">
        <div class="order__delivery">
          <form action="" class="order__delivery--form">
            <h2>Dostawa</h2>
            <div class="delivery-option">
                <input type="radio" name="delivery" id="inpost">
                <label for="delivery">InPost Kurier</label>
                <p>20zł</p>
              </div>
              <div class="delivery-option">
                <input type="radio" name="delivery" id="inpost-paczkomat">
                <label for="delivery">InPost Paczkomat</label>
                <p>20zł</p>
              </div>
              <div class="delivery-option">
                <input type="radio" name="delivery" id="dpd">
                <label for="delivery">DPD</label>
                <p>20zł</p>
              </div>
              <div class="delivery-option">
                <input type="radio" name="delivery" id="dhl">
                <label for="delivery">DHL</label>
                <p>20zł</p>
              </div>
              <div class="delivery-option">
                <input type="radio" name="delivery" id="poczta-polska">
                <label for="delivery">Poczta Polska</label>
                <p>20zł</p>
              </div>
            </form>
          </div>
        <div class="order__address">
          <form action="" class="order__address--form">
            <h2>Adres dostawy</h2>
            <div class="order__personOption">
              <div class="person-option">
                <input type="radio" name="person" id="private">
                <label for="private">Osoba prywatna</label>
              </div>
              <div class="person-option">
                <input type="radio" name="person" id="business">
                <label for="business">Firma</label>
              </div>
            </div>
            <div class="order__address--inputBox">
              <input type="text" name="name" id="name" placeholder="Imię i nazwisko lub nazwa firmy" class="address-input" required>
              <p class="order__address--inputBox--error error error-name">To pole nie może być puste</p>
            </div>
            <div class="order__address--inputBox">
              <input type="text" name="address" id="address" placeholder="Ulica i numer domu / mieszkania" class="address-input" required>
              <p class="order__address--inputBox--error error error-name">To pole nie może być puste</p>
            </div>
            <div class="order__address--inputBox">
                <input type="text" name="postcode" id="postcode" placeholder="Kod pocztowy" class="address-input" required>
                <p class="order__address--inputBox--error error error-postcode">Niepoprawny kod pocztowy</p>
            </div>
            <div class="order__address--inputBox">
              <input type="text" name="city" id="city" placeholder="Miejscowość" class="address-input" required>
              <p class="order__address--inputBox--error error error-name">To pole nie może być puste</p>
            </div>
            <div class="order__address--inputBox">
              <input type="text" name="phone" id="phone" placeholder="Numer telefonu" class="address-input">
              <p class="order__address--inputBox--error error error-name">Niepoprawny numer telefonu</p>
            </div>
            <div class="order__address--inputBox">
              <input type="email" name="email" id="email" placeholder="Email" class="address-input" required>
              <p class="order__address--inputBox--error error error-name">Niepoprawny adres email</p>
            </div>

            <h2>Dane do faktury</h2>
            <p class="invoiceInfo"><i class="ti ti-info-circle"></i>W naszym sklepie internetowym dowodem zakupu jest faktura. Standardowo wystawiamy ją na dane z adresu dostawy.</p>
            
            <div class="order__address--checkboxBox">
              <input type="checkbox" name="invoice" id="invoice" class="checkbox">
              <label for="invoice">Chcę podać inne dane do faktury</label>
            </div>
            <div class="order__address--invoceData">
              <div class="order__address--inputBox">
                <input type="text" name="name" id="name" placeholder="Imię i nazwisko lub nazwa firmy" class="address-input">
                <p class="order__address--inputBox--error error error-name">To pole nie możę być puste</p>
              </div>
              <div class="order__address--inputBox">
                <input type="text" name="address" id="address" placeholder="Ulica i numer domu / mieszkania" class="address-input">
                <p class="order__address--inputBox--error error error-name">To pole nie możę być puste</p>
              </div>
              <div class="order__address--inputBox">
                  <input type="text" name="postcode" id="postcode" placeholder="Kod pocztowy" class="address-input">
                  <p class="order__address--inputBox--error error error-postcode">Niepoprawny kod pocztowy</p>
              </div>
              <div class="order__address--inputBox">
                <input type="text" name="city" id="city" placeholder="Miejscowość" class="address-input">
                <p class="order__address--inputBox--error error error-name">To pole nie możę być puste</p>
              </div>
            </div>
          </form>
        </div>
        <div class="order__delivery">
          <form action="" class="order__delivery--form">
            <h2>Forma płatności</h2>
          <div class="delivery-option">
              <input type="radio" name="transfer" id="transfer">
              <label for="transfer">Przelew tradycyjny</label>
            </div>
            <div class="delivery-option">
              <input type="radio" name="transfer" id="blik">
              <label for="blik">BLIK</label>
            </div>
            <div class="delivery-option">
              <input type="radio" name="transfer" id="payu">
              <label for="payu">PayU</label>
            </div>
            <div class="delivery-option">
              <input type="radio" name="transfer" id="card">
              <label for="card">Karta kredytowa</label>
            </div>
          </form>
        </div>
        <div class="order__agreements">
          <h2>Zgody i oświadczenia</h2>
          <form action="">
            <div class="order__address--checkboxBox">
              <input type="checkbox" name="agreements" id="agreement" class="checkbox" required>
              <label for="agreement">Akceptuję regulamin sklepu(wymagane)</label>
            </div>
          </form>
        </div>
      </section>
      <section class="order__right">
        <div class="cart__buySection order__right--buySection">
            <button class="cart__buySection--promoBtn">Masz kod promocyjny?<i class="ti ti-chevron-down"></i></button>
            <div class="input-box" id="promobox">
                <input type="text" id="promocode" name="promocode">
                <button>Aktywuj</button>
            </div>
            <div class="cart__priceSection">
                <div class="priceBox">
                    <p>Łączna kwota</p>
                    <p class="price">0 zł</p>
                </div>
                <a href="#" class="cart__priceSection--buyBtn">Przejdź do podsumowania<i class="ti ti-chevron-right"></i></a>
            </div>
        </div>
      </section>
    </main>
    <footer class="text-light py-4 text-center">
		  <p class="mb-0"> &copy; 2023 | Sunrise</p>
	  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../../js/cart.js"></script>
  </body>
</html>
