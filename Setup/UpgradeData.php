<?php
namespace KingPalm\B2B\Setup;
use Df\Customer\AddAttribute\Customer as Add;
use KingPalm\B2B\Schema as S;
// 2019-06-04
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class UpgradeData extends \Df\Framework\Upgrade\Data {
	/**
	 * 2019-06-04
	 * @override
	 * @see \Df\Framework\Upgrade::_process()
	 * @used-by \Df\Framework\Upgrade::process()
	 */
	final protected function _process() {
		if ($this->isInitial()) {
			Add::text(S::name(), S::name(true));
			Add::checkbox(S::enable(), S::enable(true));
		}
	}
}