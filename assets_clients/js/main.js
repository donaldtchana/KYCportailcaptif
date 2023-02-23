(function ($) {
    "use strict";
	$("#items-counter").on('click',function() {
		$("body").toggleClass("cart-widget-open");
	});
	$("#cart-widget-close").on('click',function() {
		$("body").toggleClass("cart-widget-open");
	});

		$(".cart-widget-close-overlay").on('click',function() {
		$("body").toggleClass("cart-widget-open");
	});




})(jQuery);	