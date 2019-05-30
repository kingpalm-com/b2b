<?php
namespace KingPalm\B2B\Block;
use Df\Framework\Form\Element as E;
use Df\Framework\Form\Element\Checkbox;
use Df\Framework\Form\Element\Text;
use KingPalm\B2B\Renderer;
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
	 * @param $id
	 * @param $label
	 * @return string
	 */
	function cb($id, $label) {return $this->e(Checkbox::class, $id, $label);}

	/**
	 * 2019-05-30
	 * @param $id
	 * @param $label
	 * @return string
	 */
	function text($id, $label) {return $this->e(Text::class, $id, $label);}

	/**
	 * 2019-05-30
	 * @used-by cb()
	 * @used-by text()
	 * @param string $c
	 * @param $id
	 * @param $label
	 * @return string
	 */
	private function e($c, $id, $label) {
		/** @var E|AE $e */
		$e = df_new_omd($c, ['html_id' => $id, 'label' => $label, 'name' => "kingpalm_business_$id"]);
		$e->setForm($this->form());
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
}