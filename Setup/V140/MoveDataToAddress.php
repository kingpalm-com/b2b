<?php
namespace KingPalm\B2B\Setup\V140;
use KingPalm\B2B\Schema as S;
use Magento\Customer\Model\Address as A;
use Magento\Customer\Model\Customer as C;
use Magento\Customer\Model\ResourceModel\Customer\Collection as CC;
// 2019-06-21
final class MoveDataToAddress {
	/**
	 * 2019-06-21
	 * @used-by \KingPalm\B2B\Setup\UpgradeSchema::_process()
	 */
	static function p() {
		df_area_code_set_b(); // 2019-06-21 https://magento.stackexchange.com/a/96830
		$cc = df_new_om(CC::class); /** @var CC $cc */
		$cc->addAttributeToSelect('*');
		$cc->addAttributeToFilter(S::enable(), 1);
		foreach ($cc as $c) { /** @var C $c */
			/**
			 * @param string $k
			 * @param mixed|\Closure|null $d [optional]
			 * @return mixed
			 */
			$v = function($k, $d = null) use($c) {return $c["kingpalm_b2b_$k"] ?: (
				!$c instanceof \Closure ? $d : $d()
			);};
			$a = df_new_om(A::class); /** @var A $a */
			$a->setCustomer($c);
			$a->addData([
				'city' => $v('city', '---')
				,'country_id' => $iso2 = $v('country', 'US') /** @var string $iso2 */
				,'firstname' => $c['firstname']
				,'is_default_billing' => !$c->getPrimaryBillingAddress()
				,'is_default_shipping' => !$c->getPrimaryShippingAddress()
				,'lastname' => $c['lastname']
				,'middlename' => $c['middlename']
				,'postcode' => $v('postcode', function() use($iso2) {
					df_is_postcode_required($iso2) ? '000000' : null;
				})
				,'region' => $v('region')
				,'region_id' => intval($v('region_id')) ?: null
				,'save_in_address_book' => 1
				,'street' => $v('address', '---')
				,'telephone' => $v('phone', '000000')
				,'vat_id' => $v('tax')
			]);
			$a->save();
		}
	}
}