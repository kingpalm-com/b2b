// 2019-06-02
define(['jquery'], function ($) {return (
/**
 * 2019-06-02
 * @param {Object} c
 * @param {HTMLDivElement} e
 */
function(c, e) {
	var $e = $(e);
	(function() {
		var $toggled = $('.toggled', $e);
		$('.is_business', $e).click(function() {
			$toggled.toggleClass('df-hidden');
		});
	})();
});});