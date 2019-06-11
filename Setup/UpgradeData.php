<?php
namespace KingPalm\B2B\Setup;
use Df\Customer\AddAttribute\Customer as Add;
use KingPalm\B2B\Schema as S;
use KingPalm\B2B\Source\Type as sType;
use Magento\Customer\Model\Attribute\Data\Postcode as dPostcode;
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
			Add::checkbox(S::enable(), S::enable(true));
			Add::text(S::name(), S::name(true));
			Add::text(S::dba(), S::dba(true));
			Add::select(S::type(), S::type(true), sType::class);
			Add::text(S::number_of_locations(), S::number_of_locations(true));
			Add::text(S::tax(), S::tax(true));
			Add::text(S::phone(), S::phone(true));
			Add::textarea(S::address(), S::address(true));
			Add::text(S::city(), S::city(true));
			// 2019-06-11
			// I have setup the `data` key by analogy with:
			// https://github.com/magento/magento2/blob/2.3.1/app/code/Magento/Customer/Setup/CustomerSetup.php#L450-L459
			Add::text(S::postcode(), S::postcode(true), ['data' => dPostcode::class]);
			Add::textarea(S::notes(), S::notes(true));
		}
	}
}