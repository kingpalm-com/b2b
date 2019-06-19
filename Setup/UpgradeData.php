<?php
namespace KingPalm\B2B\Setup;
use Df\Customer\AddAttribute\Customer as Add;
use KingPalm\B2B\Schema as S;
use KingPalm\B2B\Source\Type as sType;
use Magento\Customer\Model\Attribute\Data\Postcode as dPostcode;
use Magento\Customer\Model\ResourceModel\Address\Attribute\Backend\Region as bRegion;
use Magento\Customer\Model\ResourceModel\Address\Attribute\Source\Country as sCountry;
use Magento\Customer\Model\ResourceModel\Address\Attribute\Source\Region as sRegion;
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
			Add::hidden(S::region(), S::region(true), ['backend' => bRegion::class]);
			Add::select(S::region_id(), S::region_id(true), sRegion::class);
			Add::select(S::country(), S::country(true), sCountry::class);
			Add::textarea(S::notes(), S::notes(true));
		}
		/**
		 * 2019-06-15
		 * "Implement the «Sales Agent» field for the «Customer» entity":
		 * https://github.com/kingpalm-com/b2b/issues/2
		 */
		if ($this->v('1.1.0')) {
			Add::text(S::agent(), S::agent(true), ['position' => S::country()]);
			df_customer_att_pos_set(S::notes(), df_customer_att_pos_next());
		}
		/**
		 * 2019-06-19
		 * It fixes the issue:
		 * "The frontend registration requires a postcode
		 * even if the «Retail Registration?» checkbox is unchecked"
		 * https://github.com/kingpalm-com/b2b/issues/6
		 */
		if ($this->v('1.1.1')) {
			df_conn()->update(df_table('customer_eav_attribute'),
				['data_model' => null], ['? = attribute_id' => df_att_code2id(S::postcode())]
			);
		}
	}
}