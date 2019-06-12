// 2019-06-12
define(['df-lodash', 'jquery', 'KingPalm_B2B/regionUpdater'], function(_, $) {return function(d) {
	/**
	 * 2019-06-12
 	 * @param {String[]} ee
	 * @param {Function} cb
	 */
	var wait = function(ee, cb) {
		!_.find(ee, function(e) {return !$(e).length})
			? cb()
			: setTimeout(function() {wait(ee, cb);}, 1000)
		;
	};
	wait([d.country, d.region, d.regionId], function() {
		$(d.country).regionUpdater({
			countriesWithOptionalZip: d.countriesWithOptionalZip
			,defaultRegion: ''
			,form: null
			,optionalRegionAllowed: true
			,postcodeId: '#' + $(d.postcode).attr('id')
			,regionInputId: '#' + $(d.region).attr('id')
			,regionJson: d.json
			,regionListId: '#' + $(d.regionId).attr('id')
		});
	});
	// 2019-06-12
	// 1) I use `toggleClass` instead of `toggle`
	// because `toggle` changes the `display` CSS property, and `regionUpdater` does the same.
	// So `toggleClass` prevents the conflict.
	// 2) Also, this `wait` block should be below the `regionUpdater`'s block,
	// otherwise adding `style="display: block;` to a block with the `df-hidden` class will show the block.
	wait([d.enable], function() {
		$(d.enable).change(function() {
			$('[name^=customer\\[kingpalm_b2b_]').not(this).closest('.admin__field').toggleClass(
				'df-hidden', !$(this).is(':checked')
			);
		});
		$(d.enable).change();
	});
}});