<?php
namespace KingPalm\B2B\Block;
use Df\Framework\Form\Element as E;
use Df\Framework\Form\Element\Checkbox;
use Df\Framework\Form\Element\Select;
use Df\Framework\Form\Element\Text;
use KingPalm\B2B\Renderer;
use Magento\Customer\Block\Form\Register;
use Magento\Customer\Block\Widget\Taxvat;
use Magento\Framework\Data\Form;
use Magento\Framework\Data\Form\Element\AbstractElement as AE;
use Magento\Framework\View\Element\Template as _P;
/**
 * 2019-05-30
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 */
class Registration extends _P {
	/**
	 * 2019-05-30
	 * @used-by vendor/kingpalm/b2b/view/frontend/templates/registration.phtml
	 * @param $id
	 * @param $label
	 * @return string
	 */
	function cb($id, $label) {return $this->e(Checkbox::class, $id, $label);}

	/**
	 * 2019-05-31
	 * @used-by vendor/kingpalm/b2b/view/frontend/templates/registration.phtml
	 * @param string $id
	 * @param string $label
	 * @param array(string => mixed) $d [optional]
	 * @return string
	 */
	function inline($id, $label) {return $this->e(Text::class, $id, $label, ['class' => 'df-inline']);}

	/**
	 * 2019-05-30
	 * @used-by vendor/kingpalm/b2b/view/frontend/templates/registration.phtml
	 * @param string $id
	 * @param string $label
	 * @param string[]
	 * @return string[] $o
	 */
	function select($id, $label, array $o) {return $this->e(Select::class, $id, $label, [
		'values' => df_a_to_options($o)
	]);}

	/**
	 * 2019-05-31 Currently, it is not used.
	 * @used-by vendor/kingpalm/b2b/view/frontend/templates/registration.phtml
	 * @return string|null
	 */
	function tax() {
		$b = $this->getLayout()->createBlock(Taxvat::class); /** @var Taxvat $b */
		$taxvat['taxvat'] = $this->v('taxvat');
		/**
		 * 2019-05-31
		 * If the block is enabled, then it is already rendered by the standard Magento code:
		 * https://github.com/magento/magento2/blob/2.3.1/app/code/Magento/Customer/view/frontend/templates/form/register.phtml#L35-L38
		 * So we do not render it in this case.
		 */
		return $b->isEnabled() ? null : $b->toHtml();
	}

	/**
	 * 2019-05-30
	 * @used-by vendor/kingpalm/b2b/view/frontend/templates/registration.phtml
	 * @param string $id
	 * @param string $label
	 * @param array(string => mixed) $d [optional]
	 * @return string
	 */
	function text($id, $label, $d = []) {return $this->e(Text::class, $id, $label, $d);}

	/**
	 * 2019-05-30
	 * @used-by cb()
	 * @used-by inline()
	 * @used-by text()
	 * @param string $c
	 * @param string $id
	 * @param string $label
	 * @param array(string => mixed) $d [optional]
	 * @return string
	 */
	private function e($c, $id, $label, $d = []) {
		$e = df_new_omd($c,
			['class' => df_cc_s($id, dfa($d, 'class'))]
			+ $d
			+ ['html_id' => $id, 'label' => $label, 'name' => "kingpalm_business_$id"]
		); /** @var E|AE $e */
		$e->setForm($this->form());
		$e->setRenderer($this->r());
		return $this->r()->render($e);
	}

	/**
	 * 2019-05-30
	 * @used-by e()
	 * @return Form
	 */
	private function form() {return dfc($this, function() {return
		df_new_omd(Form::class, ['html_id_prefix' => 'kingpalm-b2b-registration-'])
	;});}

	/**
	 * 2019-05-30
	 * @used-by e()
	 * @return Renderer
	 */
	private function r() {return dfc($this, function() {return new Renderer;});}

	/**
	 * 2019-05-31
	 * @used-by tax()
	 * @param string $k
	 * @return string|null
	 */
	private function v($k) {return dfc($this, function() {
		$b = df_layout()->getBlock('customer_form_register'); /** @var Register $b */
		return $b->getFormData();
	})[$k];}
}