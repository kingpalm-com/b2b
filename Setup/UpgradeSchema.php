<?php
namespace KingPalm\B2B\Setup;
use KingPalm\B2B\Schema as S;
// 2019-06-04
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class UpgradeSchema extends \Df\Framework\Upgrade\Schema {
	/**
	 * 2019-06-04
	 * @override
	 * @see \Df\Framework\Upgrade::_process()
	 * @used-by \Df\Framework\Upgrade::process()
	 */
	final protected function _process() {
		if ($this->isInitial()) {
			// 2019-06-05 @todo Add comments to columns.
			df_dbc_c(S::name());
			df_dbc_c(S::enable());
		}
	}
}