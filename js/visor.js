$(document).on('ready', function () {
	var slider = new Swiper ('.swiper-container', {
		initialSlide: 0,
		direction: 'vertical', // horizontal || vertical
		speed: 1000, // in ms.
		autoplay: 1000, // in ms (coment for disable)
		autoplayDisableOnInteraction: false,
		watchSlidesProgress: false,
		effect: "fade", // Could be "slide", "fade", "cube" or "coverflow"
		loop: true,

		pagination: '.swiper-pagination',

		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',

		scrollbar: '.swiper-scrollbar'
	});
});
