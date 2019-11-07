$(document).ready(function () {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('.header-catalog').addClass('header-mobile-active');
		$('.header-catalog').removeAttr('href');
	}
	$('.header-sidebar').slideUp(500);
	$('.header-mobile-active').on('click', function () {
		if ($('.header-sidebar').hasClass('active-side')) {
			$('.header-sidebar').removeClass('active-side');
			$('.header-sidebar').slideUp(500);
			return;	
		} else {
			$('.header-sidebar').addClass('active-side');
			$('.header-sidebar').slideDown(500);
			return;
		}

	});
	$('.header-menu-navigation').addClass('header-disable');
	$('.burger').on('click', function() {
		$('.burger').toggleClass('active-burger');
		if ($('.header-menu-navigation').hasClass('header-disable')) {
			$('.header-menu-navigation').removeClass('header-disable');
			$('.header-menu-navigation').addClass('header-active');
			return;
		}
		if ($('.header-menu-navigation').hasClass('header-active')) {
			$('.header-menu-navigation').removeClass('header-active');
			$('.header-menu-navigation').addClass('header-disable');
			return;
		}
	});
	$('.product-calc-btn').on('click', function () {
		$valueProduct = $('.product-calc-number').attr('value');
		if ($(this).hasClass('calc-minus') && $valueProduct >= 1) {
			$valueProduct--;
			$('.product-calc-number').attr('value',''+ $valueProduct +'');
		} else if ($(this).hasClass('calc-plus')) {
			$equally = +$valueProduct+1;
			$('.product-calc-number').attr('value',''+ $equally +'');
		}
	});

	$('.content-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});
	

	$('.content-product-button').on('click', function () {
		$('.content-product-button').removeClass('product-active-btn');
		$(this).addClass('product-active-btn');
	});

	$('.product-img-disable').on('click', function () {
		var attributs = $(this).attr('src');
		$('.product-img-active').attr('src', ''+attributs+'');
		$('.gallery').attr('href', ''+attributs+'');
	});
	/*$('.header-top-btn').on('click', function () {
		$('.popup').addClass('active-popup');
	});*/
	$('.popup-wrap button').on('click', function () {
		$('.popup').removeClass('active-popup');
	});

	phone = $(".popup-phone");
	var options =  {
		onChange: function() {
			$('.popup-submit').attr('disabled','disabled');
		},
		onComplete: function(){
			$('.popup-submit').removeAttr('disabled');
		}
	};
	phone.mask("+7(999) 999-99-99", options);

	// if ($('.checkbox').attr('checked') == 'checked') {
	orderForm = $('.popup-form');
	sendBtn = $('.popup-submit');
	sendBtn.on('click', function() {
		/*if (($('.popup-phone').val() != '')) {
			sendBtn.hide();
			$('.loader').fadeIn(300);
			$.ajax({
				data: orderForm.serialize(),
				url: '/send.php',
				type: 'POST',
				success: function(data) {
					$('.after-post').fadeIn(300);
					setTimeout("window.location.reload()",6000);
				}
			});
			return false;
		} else {
			personalSqur.addClass('invalid');
		}*/
	});

		// phone.mask("+7(999) 999-9999", options);

		// $('.popup-submit').on('click', function(){

		// 	if (phone.val() != '' && checkbox.prop("checked")) {

		// 	}
		// });
	// };
});
