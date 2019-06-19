<?php
/**
 * 2019-06-13 «customer_register_success»: a customer registration event
 * @used-by \Magento\Customer\Controller\Account\CreatePost::execute()
 * https://mage2.pro/t/2357
 * https://github.com/magento/magento2/blob/2.0.0/app/code/Magento/Customer/Controller/Account/CreatePost.php#L239-L242
 */
namespace KingPalm\B2B\Observer;
use KingPalm\B2B\Schema as S;
use Magento\Customer\Model\Customer;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
final class RegisterSuccess implements ObserverInterface {
	/**
	 * 2016-12-03
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @param O $o
	 */
	function execute(O $o) {
		$c = df_customer($o['customer']); /** @var Customer $c */
		if ($c[S::enable()]) {
			df_mail(
				df_my() ? 'admin@mage2.pro' : df_cfg('contact/email/recipient_email')
				,'A business registration: ' . $c[S::name()]
				,df_format_kv_table([
					'Name' => $c->getName()
					,'Email' =>  $c->getEmail()
					,S::name(true) => $c[S::name()]
					,S::dba(true) => $c[S::dba()]
					,S::type(true) => $c[S::type()]
					,S::number_of_locations(true) => $c[S::number_of_locations()]
					,S::tax(true) => $c[S::tax()]
					,S::phone(true) => $c[S::phone()]
					,S::address(true) => $c[S::address()]
					,S::city(true) => $c[S::city()]
					,S::postcode(true) => $c[S::postcode()]
					,S::region(true) => df_region_name($c[S::region()], $c[S::region_id()])
					,S::country(true) => df_country_ctn($c[S::country()])
					,S::agent(true) => $c[S::agent()]
					,S::notes(true) => $c[S::notes()]
				])
			);
		}
	}
}