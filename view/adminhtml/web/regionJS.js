// 2019-06-12
define(['jquery', 'KingPalm_B2B/regionUpdater'], function($) {return function(d) {
	var wait = function() {
		if (!$(d.country).length || !$(d.region).length || !$(d.regionId).length) {
			setTimeout(wait, 1000);
		}
		else setTimeout(function() {
			/** @type {HTMLSelectElement} */ var $country = $(d.country);
			/** @type {HTMLInputElement} */ var $region = $(d.region);
			/** @type {HTMLInputElement} */ var $regionId = $(d.regionId);
			/** @type {HTMLInputElement} */ var $postcode = $(d.postcode);
			$country.regionUpdater({
				countriesWithOptionalZip: d.countriesWithOptionalZip
				,defaultRegion: ''
				,form: null
				,optionalRegionAllowed: true
				,postcodeId: '#' + $postcode.attr('id')
				,regionInputId: '#' + $region.attr('id')
				,regionJson: d.json
				,regionListId: '#' + $regionId.attr('id')
			});
		}, 500);
	};
	wait();
}});