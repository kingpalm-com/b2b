<?php
/**
 * 2019-06-13 «customer_register_success»: a customer registration event
 * @used-by \Magento\Customer\Controller\Account\CreatePost::execute()
 * https://mage2.pro/t/2357
 * https://github.com/magento/magento2/blob/2.0.0/app/code/Magento/Customer/Controller/Account/CreatePost.php#L239-L242
 */
namespace KingPalm\B2B\Observer;
use \Magento\Contact\Model\ConfigInterface as IContact;
use KingPalm\B2B\Schema as S;
use Magento\Customer\Model\Address as A;
use Magento\Customer\Model\Customer;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
final class RegisterSuccess implements ObserverInterface {
	/**
	 * 2019-06-13
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @param O $o
	 */
	function execute(O $o) {
		$c = df_customer($o['customer']); /** @var Customer $c */
		if ($c[S::enable()]) {
			$a = df_first($c->getAddresses()); /** @var A $a */
			df_mail(
				df_my() ? 'admin@mage2.pro' :
					/**
					 * 2019-07-06
					 * 1) "Notify the `sales@oozewholesale.com` recipient about business registrations":
					 * https://github.com/kingpalm-com/b2b/issues/7
					 * 2) Magento does not aloow multiple email addresses
					 * in the @see IContact::XML_PATH_EMAIL_RECIPIENT field,
					 * so I hardcode the `sales@oozewholesale.com` address as the fastest solution.
					 */
					[df_cfg(IContact::XML_PATH_EMAIL_RECIPIENT), 'sales@oozewholesale.com']
				,'A business registration: ' . $c[S::name()]
				,df_format_kv_table([
					'Name' => $c->getName()
					,'Email' =>  $c->getEmail()
					,S::name(true) => $a->getCompany()
					,S::dba(true) => $c[S::dba()]
					,S::type(true) => $c[S::type()]
					,S::number_of_locations(true) => $c[S::number_of_locations()]
					,S::tax(true) => $a['vat_id']
					,S::phone(true) => $a->getTelephone()
					,S::address(true) => df_cc_s($a->getStreet())
					,S::city(true) => $a->getCity()
					,S::postcode(true) => $a->getPostcode()
					,S::region(true) => df_region_name($a['region'], $a['region_id'])
					,S::country(true) => df_country_ctn($a->getCountryId())
					,S::agent(true) => $c[S::agent()]
					,S::notes(true) => $c[S::notes()]
				])
			);
		}
	}
}