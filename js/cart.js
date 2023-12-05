const promoBtn = document.querySelector('.cart__buySection--promoBtn');
const promocodeBox = document.querySelector('#promobox');
promoBtn.addEventListener('click', () => {
	if(promocodeBox.style.display=='flex') {
		promocodeBox.style.display='none';
	} else {
		promocodeBox.style.display='flex';
	}
})
const productsPrice = document.querySelectorAll('.cart__product--price')

const changeQuantity = (id, quantity) => {
	console.log('test')
	const formData = new FormData()
	formData.append('id', id)
	formData.append('quantity', quantity)
	fetch('../../php/change_quantity.php', {
		method: 'POST',
		body: formData
	})
}

$(document).ready(function() {
	$('.minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		var id = $(this).parent().parent().attr('id');
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		changeQuantity(id, count)
	});
	$('.plus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) + 1;
		var id = $(this).parent().parent().attr('id');
		$input.val(count);
		$input.change();
		changeQuantity(id, count)
	});
});


let total = 0;
let i = 0;
const totalPrice = document.querySelector('.price')
productsPrice.forEach(element => {
		let quantity = element.nextElementSibling.firstElementChild.nextElementSibling
		total += parseFloat(element.innerHTML) * parseFloat(quantity.value)
		console.log(total)
		i++
})
totalPrice.innerHTML = `${total} zł`
const productCount = document.querySelector('.cart__addons')
productCount.insertAdjacentHTML('afterbegin', `<h3>Koszyk  (${i})</h3>`)

