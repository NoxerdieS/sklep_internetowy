const orderBtn = document.querySelector('#orderBtn');
const total = document.querySelector('.price');
const promoBtn = document.querySelector('.cart__buySection--promoBtn');
const invoiceCheckbox = document.querySelector('#invoice');
const invoiceForm = document.querySelector('.order__address--invoceData');
const promocodeBox = document.querySelector('#promobox');
let deliveryError = true;
let paymentError = true;

promoBtn.addEventListener('click', () => {
	let isPromoCode = 0;
	if (promocodeBox.style.display == 'flex') {
		promocodeBox.style.display = 'none';
		isPromoCode = 0;
	} else {
		isPromoCode = 1;
		promocodeBox.style.display = 'flex';
	}
});

let invoice = 0;
invoiceCheckbox.addEventListener('change', () => {
	if (invoiceForm.style.display == 'flex') {
		invoice = 0;
		invoiceForm.style.display = 'none';
	} else {
		invoice = 1;
		invoiceForm.style.display = 'flex';
	}
});

const validateDeliveryAndPayment = () => {
	const radiosDelivery = document.getElementsByName('delivery');
	const radiosPayment = document.getElementsByName('payment');
	const deliveryErrorParagraph = document.querySelector('.delivery-error');
	const paymentErrorParagraph = document.querySelector('.payment-error');

	let delivery = 0;
	let payment = 0;
	radiosDelivery.forEach((element) => {
		if (!element.checked) {
			delivery++;
		}
	});
	radiosPayment.forEach((element) => {
		if (!element.checked) {
			payment++;
		}
	});

	if (delivery == radiosDelivery.length) {
		deliveryErrorParagraph.style.display = 'block';
		deliveryError = true;
		orderBtn.setAttribute('href', '#');
	} else {
		deliveryErrorParagraph.style.display = 'none';
		deliveryError = false;
	}

	if (payment == radiosPayment.length) {
		paymentErrorParagraph.style.display = 'block';
		paymentError = true;
		orderBtn.setAttribute('href', '#');
	} else {
		paymentErrorParagraph.style.display = 'none';
		paymentError = false;
	}
};

orderBtn.addEventListener('mouseover', () => {
	validateDeliveryAndPayment();
	if (deliveryError == true || paymentError == true) {
		orderBtn.disabled = true;
	} else {
		orderBtn.disabled = false;
	}
});

orderBtn.addEventListener('click', (e) => {
	const deliveryForm = document.querySelector('#delivery');
	const addressForm = document.querySelector('#address');
	const invoiceForm = document.querySelector('#invoice');
	const paymentForm = document.querySelector('#payment');
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
	formData.append('invoice', invoice);
	if (invoice == 1) {
		const invoiceData = new FormData(invoiceForm);
		for (var pair of invoiceData.entries()) {
			formData.append(pair[0], pair[1]);
		}
	}
	let totalValue = parseFloat(total.innerHTML);
	formData.append('total', totalValue);

	fetch('../../php/place_order.php', {
		method: 'POST',
		body: formData,
	})
		.then((res) => {
			return res.text();
		})
		.then((body) => {
			const tempForm = document.createElement('form');
			tempForm.action = './summary.php';
			tempForm.method = 'POST';
			var tempInput = document.createElement('input');
			tempInput.type = 'number';
			tempInput.name = 'order_id';
			tempInput.value = body;

			tempForm.appendChild(tempInput);
			document.body.appendChild(tempForm);
			tempForm.submit();
		});
});
