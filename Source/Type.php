<?php
namespace KingPalm\B2B\Source;
/**
 * 2019-06-10
 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
 */
final class Type extends \Df\Config\Source {
	/**
	 * 2017-03-21
	 * @override
	 * @see \Df\Config\Source::map()
	 * @used-by \Df\Config\Source::toOptionArray()
	 * @see \Df\Payment\Source\ACR::map()
	 * @return array(string => string)
	 */
	protected function map() {return ['' => self::PLACEHOLDER] + dfa_combine_self([
		'Smoke Shop', 'Dispensary', 'Vape Shop', 'Adult Store', 'Gas Station'
		,'Convenience/Liquor/Grocery Store', 'Distributor/Wholesaler', 'Gift/Novelty Shop'
		,'Hookah Lounge/Store', 'Tobacco Store', 'Tattoo Parlor', 'Processor'
	]);}

	/** 
	 * 2019-06-11
	 * @used-by map()
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 */
	const PLACEHOLDER = 'please select';
}


