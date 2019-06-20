<?php
/**
 * 2019-06-20
 * @see \Magento\Customer\Controller\Adminhtml\Index\Save::execute():
 *	$this->_eventManager->dispatch(
 *		'adminhtml_customer_prepare_save',
 *		['customer' => $customer, 'request' => $this->getRequest()]
 *	);
 * https://github.com/magento/magento2/blob/2.3.1/app/code/Magento/Customer/Controller/Adminhtml/Index/Save.php#L320-L323
 */
namespace KingPalm\B2B\Observer;
use Magento\Customer\Model\Customer as C;
use Magento\Customer\Model\Data\Customer as CD;
use Magento\Email\Model\Template as T;
use Magento\Framework\Event\Observer as O;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Mail\TemplateInterface as IT;
final class AdminhtmlCustomerPrepareSave implements ObserverInterface {
	/**
	 * 2019-06-20
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @param O $o
	 */
	function execute(O $o) {
		$cd = $o['customer']; /** @var CD $cd */
		if ($id = $cd->getId()) { /** @var int|null $id */
			$c = df_customer($id); /** @var C $c */
			if (3 === intval($cd->getGroupId()) && 3 !== intval($c->getGroupId())) {
				$t = df_mail_t(8); /** @var IT|T $t */
				$t->setOptions(['area' => 'frontend', 'store' => $cd->getStoreId()]);
				$t->setVars(['customer' => $c, 'store' => df_store($cd->getStoreId())]);
				df_mail(
					df_my() ? 'admin@mage2.pro' : $cd->getEmail()
					,'Your account has been switched to the Retailer group'
					,$t->processTemplate()
				);
			}
		}
	}
}