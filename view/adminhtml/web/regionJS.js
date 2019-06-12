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
}});