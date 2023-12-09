let isPromoCode = 0;
const promoBtn = document.querySelector(".cart__buySection--promoBtn");
const promocodeBox = document.querySelector("#promobox");
promoBtn.addEventListener("click", () => {
  if (promocodeBox.style.display == "flex") {
    promocodeBox.style.display = "none";
    isPromoCode = 0;
  } else {
    isPromoCode = 1;
    promocodeBox.style.display = "flex";
  }
});

const invoiceCheckbox = document.querySelector("#invoice");
const invoiceForm = document.querySelector(".order__address--invoceData");
let invoice = 0;
invoiceCheckbox.addEventListener("change", () => {
  if (invoiceForm.style.display == "flex") {
    invoice = 0;
    invoiceForm.style.display = "none";
  } else {
    invoice = 1;
    invoiceForm.style.display = "flex";
  }
});

const orderBtn = document.querySelector("#orderBtn");
const total = document.querySelector(".price");

orderBtn.addEventListener("click", (e) => {
  const deliveryForm = document.querySelector("#delivery");
  const addressForm = document.querySelector("#address");
  const invoiceForm = document.querySelector("#invoice");
  const paymentForm = document.querySelector("#payment");
  e.preventDefault();

  const shippingData = new FormData(deliveryForm);

  const addressData = new FormData(addressForm);

  const formData = new FormData();

  const paymentData = new FormData(paymentForm);

  for (var pair of shippingData.entries()) {
    formData.append(pair[0], pair[1]);
  }
  for (var pair of paymentData.entries()) {
    formData.append(pair[0], pair[1]);
  }
  for (var pair of addressData.entries()) {
    formData.append(pair[0], pair[1]);
  }
  formData.append("invoice", invoice);
  if (invoice == 1) {
    const invoiceData = new FormData(invoiceForm);
    for (var pair of invoiceData.entries()) {
      formData.append(pair[0], pair[1]);
    }
  }
  let totalValue = parseFloat(total.innerHTML);
  formData.append("total", totalValue);

  fetch("../../php/place_order.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => {
      return res.text();
    })
    .then((body) => {
      const tempForm = document.createElement("form");
      tempForm.action = "./summary.php";
      tempForm.method = "POST";
      var tempInput = document.createElement("input");
      tempInput.type = "number";
      tempInput.name = "order_id";
      tempInput.value = body;

      tempForm.appendChild(tempInput);
      document.body.appendChild(tempForm);
      tempForm.submit();
    });
});
