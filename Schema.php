<?php
namespace KingPalm\B2B;
// 2019-06-04
final class Schema {
	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function address($l = false) {return !$l ? 'street[]' : 'Storefront Business Address';}

	/**
	 * 2019-06-15
	 * "Implement the «Sales Agent» field for the «Customer» entity":
	 * https://github.com/kingpalm-com/b2b/issues/2
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function agent($l = false) {return !$l ? self::f() : 'Sales Agent';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function city($l = false) {return !$l ? 'city' : 'City';}
	
	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\RegionJS\Backend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\RegionJS\Frontend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function country($l = false) {return !$l ? 'country_id' : 'Country';}

	/**
	 * 2019-06-10
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function dba($l = false) {return !$l ? self::f() : 'DBA (Doing Business As)';}

	/**
	 * 2019-06-04                                           
	 * @used-by \KingPalm\B2B\Block\RegionJS\Backend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function enable($l = false) {return !$l ? self::f() : 'Retail Registration?';}

	/**
	 * 2019-06-21 Currently, it is not used.
	 * @param string $f
	 * @return bool
	 */
	static function isCustom($f) {return df_starts_with($f, self::$PREFIX);}

	/**
	 * 2019-06-04
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function name($l = false) {return !$l ? self::f() : 'Business Name';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function notes($l = false) {return !$l ? self::f() : 'Notes';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function number_of_locations($l = false) {return !$l ? self::f() : 'Number of Locations';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function phone($l = false) {return !$l ? 'telephone' : 'Phone Number';}

	/**
	 * 2019-06-11                                             
	 * @used-by \KingPalm\B2B\Block\RegionJS\Backend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\RegionJS\Frontend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process() 
	 * @param bool $l [optional]
	 * @return string
	 */
	static function postcode($l = false) {return !$l ? 'postcode' : 'Zip Code';}
	
	/**
	 * 2019-06-11                                     
	 * @used-by \KingPalm\B2B\Block\RegionJS\Backend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\RegionJS\Frontend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\Registration::region()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()  
	 * @param bool $l [optional]
	 * @return string
	 */
	static function region($l = false) {return !$l ? 'region' : 'State/Province';}

	/**
	 * 2019-06-11                      
	 * @used-by \KingPalm\B2B\Block\RegionJS\Backend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\RegionJS\Frontend::_toHtml()
	 * @used-by \KingPalm\B2B\Block\Registration::region()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function region_id($l = false) {return !$l ? 'region_id' : 'State/Province';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function tax($l = false) {return !$l ? self::f() : 'Tax ID';}

	/**
	 * 2019-06-10
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Observer\RegisterSuccess::execute()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function type($l = false) {return !$l ? self::f() : 'What type of business do you run?';}

	/**
	 * 2019-06-04
	 * @used-by dba()
	 * @used-by enable()
	 * @used-by name()
	 * @used-by number_of_locations()
	 * @used-by type()
	 * @return string
	 */
	private static function f() {return self::$PREFIX . df_caller_f();}

	/**
	 * 2019-06-21
	 * @used-by f()
	 * @used-by isCustom()
	 * @var string
	 */
	private static $PREFIX = 'kingpalm_b2b_';
}