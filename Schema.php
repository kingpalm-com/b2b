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
	static function address($l = false) {return !$l ? self::f() : 'Storefront Business Address';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function city($l = false) {return !$l ? self::f() : 'City';}
	
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
	static function country($l = false) {return !$l ? self::f() : 'Country';}	

	/**
	 * 2019-06-10
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
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
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function enable($l = false) {return !$l ? self::f() : 'Retail Registration?';}

	/**
	 * 2019-06-04
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function name($l = false) {return !$l ? self::f() : 'Business Name';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
	 * @used-by \KingPalm\B2B\Setup\UpgradeData::_process()
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 * @param bool $l [optional]
	 * @return string
	 */
	static function notes($l = false) {return !$l ? self::f() : 'Notes';}

	/**
	 * 2019-06-11
	 * @used-by \KingPalm\B2B\Block\Registration::_toHtml()
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
	static function phone($l = false) {return !$l ? self::f() : 'Phone Number';}

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
	static function postcode($l = false) {return !$l ? self::f() : 'Zip Code';}
	
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
	static function region($l = false) {return !$l ? self::f() : 'State/Province';}	

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
	static function region_id($l = false) {return !$l ? self::f() : 'State/Province';}

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
	 * @used-by tax()
	 * @used-by type()
	 * @return string
	 */
	private static function f() {return 'kingpalm_b2b_' . df_caller_f();}
}