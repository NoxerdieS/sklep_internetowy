const promoBtn = document.querySelector('.cart__buySection--promoBtn');
const promocodeBox = document.querySelector('#promobox');
promoBtn.addEventListener('click', () => {
	if(promocodeBox.style.display=='flex') {
		promocodeBox.style.display='none';
	} else {
		promocodeBox.style.display='flex';
	}
})
$(document).ready(function() {
	$('.minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
});