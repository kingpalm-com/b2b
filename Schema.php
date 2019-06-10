<?php
namespace KingPalm\B2B;
// 2019-06-04
final class Schema {
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
	 * @used-by name()
	 * @return string
	 */
	private static function f() {return 'kingpalm_b2b_' . df_caller_f();}
}