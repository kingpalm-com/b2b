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
		var $checkbox = $('#kingpalm_b2b_enable', $e);
		var update = function() {
			var checked = $checkbox.is(':checked');
			$toggled.toggleClass('df-hidden', !checked);
			var $elements = $(':input', $toggled);
			/**
			 * 2019-06-19
			 * It fixes the issue:
			 * "The frontend registration requires a postcode
			 * even if the «Retail Registration?» checkbox is unchecked"
			 * https://github.com/kingpalm-com/b2b/issues/6
			 * 2019-06-21 All `disabled` attributes are not submitted to the server (I have checked it).
			 */
			checked ? $elements.removeAttrs('disabled') : $elements.attr('disabled', 'disabled');
		};
		$checkbox.change(update);
		update();
		/**
		 * 2019-06-20
		 * 1) "Point the «Wholesale» menu item to the retail customers registration page":
		 * https://github.com/kingpalm-com/b2b/issues/5
		 * 2) "How to add a query parameter to an URL via a CMS directive?": https://mage2.pro/t/5943
		 * 3) `location.search`:
		 * https://developer.mozilla.org/en-US/docs/Web/API/Location
		 * https://developer.mozilla.org/en-US/docs/Web/API/HTMLHyperlinkElementUtils/search
		 */
		if (-1 !== location.search.indexOf('wholesale')) {
			$checkbox.prop('checked', true);
			update();
		}
	})();
	(function() {
		if ('localhost.com' === location.hostname) {
			var d = {
				firstname: 'Dmitry'
				,city: 'New York City'
				,country_id: 'US'
				,email_address: 'admin2@mage2.pro'
				,kingpalm_b2b_dba: 'Mage2.PRO'
				,kingpalm_b2b_name: 'Individual Entrepreneur Fedyuk Dmitry Sergeevich'
				,kingpalm_b2b_notes: 'A test note'
				,kingpalm_b2b_number_of_locations: 10
				,kingpalm_b2b_region_id: 43
				,kingpalm_b2b_tax: 222222222
				,kingpalm_b2b_type: 'Adult Store'
				,lastname: 'Fedyuk 2'
				,password: '@Jaxike2r'
				,'password-confirmation': '@Jaxike2r'
				,postcode: '10001'
				,'street\\[\\]': '49 West 32nd Street'
				,telephone: '(212) 736-3800'
			};
			$.each(d, function(k, v) {
				var $e = $('#' + k, $('#form-validate'));
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