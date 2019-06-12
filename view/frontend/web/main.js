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
		$('.enable', $e).click(function() {
			$toggled.toggleClass('df-hidden');
		});
	})();
	(function() {
		if ('localhost.com' === location.hostname) {
			var d = {
				firstname: 'Dmitry'
				,lastname: 'Fedyuk 2'
				,email_address: 'admin2@mage2.pro'
				,password: '@Jaxike2r'
				,'password-confirmation': '@Jaxike2r'
				,kingpalm_b2b_name: 'Individual Entrepreneur Fedyuk Dmitry Sergeevich'
				,kingpalm_b2b_dba: 'Mage2.PRO'
				,kingpalm_b2b_enable: 1
				,kingpalm_b2b_type: 'Adult Store'
				,kingpalm_b2b_number_of_locations: 10
				,kingpalm_b2b_tax: 222-222-222
				,kingpalm_b2b_phone: '(212) 736-3800'
				,kingpalm_b2b_address: '49 West 32nd Street'
				,kingpalm_b2b_city: 'New York City'
				,kingpalm_b2b_postcode: '10001'
				,kingpalm_b2b_region_id: 43
				,kingpalm_b2b_country: 'US'
				,kingpalm_b2b_notes: 'A test note'
			};
			var $form = $('#form-validate');
			$.each(d, function(k, v) {
				var $e = $('#' + k, $form);
				if ($e.is(':checkbox')) {
					$e.prop('checked', true);
				}
				else {
					$e.val(v);
					if ($e.hasClass('df-select2')) {
						$e.trigger('change');
					}
				}
			});
		}
	})();
});});