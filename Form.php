<?php
namespace KingPalm\B2B;
// 2019-06-11
final class Form {
	/**
	 * 2019-06-04                                       
	 * @used-by idS()
	 * @used-by \KingPalm\B2B\Block\Registration::form()
	 * @used-by \KingPalm\B2B\Block\Registration::region()
	 * @param string $v [optional]
	 * @return string
	 */
	static function id($v = '') {return "kingpalm-b2b-$v";}

	/**
	 * 2019-06-04
	 * @used-by \KingPalm\B2B\Block\RegionJS::regionJS()
	 * @param string $v [optional]
	 * @return string
	 */
	static function idS($v) {return '#' . self::id($v);}	
}