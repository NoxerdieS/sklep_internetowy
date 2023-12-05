const mobileMenuButton = document.querySelector('.nav__mobile--bars');
const mobileMenu = document.querySelector('.nav__mobileMenu');
const allMobileMenuItems = document.querySelectorAll('.menu-item');
const allMobileDropdowns = document.querySelectorAll('.dropdown');


const showMenu = () => {
	mobileMenu.classList.toggle('visible');
};

const showMobileMenuItems = (num) => () => {
	allMobileDropdowns.forEach((element) => {
        if (element.classList.contains(`dropdown-${num}`)) {
			element.classList.toggle('visible-menu');
		} 
	});
};

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

mobileMenuButton.addEventListener('click', showMenu);
allMobileMenuItems[0].addEventListener('click', showMobileMenuItems('one'));
allMobileMenuItems[1].addEventListener('click', showMobileMenuItems('two'));
allMobileMenuItems[2].addEventListener('click', showMobileMenuItems('three'));
