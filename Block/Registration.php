<?php
namespace KingPalm\B2B\Block;
use Df\Directory\FE\Country;
use Df\Framework\Form\Element as E;
use Df\Framework\Form\Element\Checkbox;
use Df\Framework\Form\Element\Select2;
use Df\Framework\Form\Element\Text;
use Df\Framework\Form\Element\Textarea;
use KingPalm\B2B\Renderer;
use KingPalm\B2B\Schema as S;
use KingPalm\B2B\Source\Type as sType;
use Magento\Customer\Block\Form\Register;
use Magento\Customer\Block\Widget\Taxvat;
use Magento\Framework\Data\Form;
use Magento\Framework\Data\Form\Element\AbstractElement as AE;
use Magento\Framework\View\Element\AbstractBlock as _P;
// 2019-05-30
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Registration extends _P {
	/**
	 * 2019-05-30 https://github.com/magento/magento2/blob/2.3.1/app/code/Magento/Customer/view/frontend/templates/form/register.phtml
	 * @override
	 * @see _P::_toHtml()
	 * @used-by _P::toHtml():
	 *		$html = $this->_loadCache();
	 *		if ($html === false) {
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->suspend($this->getData('translate_inline'));
	 *			}
	 *			$this->_beforeToHtml();
	 *			$html = $this->_toHtml();
	 *			$this->_saveCache($html);
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->resume();
	 *			}
	 *		}
	 *		$html = $this->_afterToHtml($html);
	 * https://github.com/magento/magento2/blob/2.2.0/lib/internal/Magento/Framework/View/Element/AbstractBlock.php#L643-L689
	 * @return string
	 */
	final protected function _toHtml() {return df_tag('div'
		,df_widget($this) + ['class' => 'kingpalm-b2b-registration']
		,[
			$this->cb(S::enable(), S::enable(true))
			,df_tag('div', df_cc_s('toggled', df_my() ? null : 'df-hidden'), [
				df_tag('div', 'note', [
					df_tag('div', 'note-block note-block-1', [
						df_tag('p', [], 'Retail Accounts Are For Storefront Businesses ONLY!')
						,df_tag('p', [], 'ALL ONLINE STORES (AMAZON, eBAY, ECOMM) WILL ALL BE REJECTED.')
					])
					,df_tag('div', 'note-block note-block-2', [
						df_tag('p', [],
							'Once approved, you will receive an approval email'
							.' that will allow you to view pricing and check out.'
						)
						,df_tag('p', [], 'Approvals are usually same day (but may take up to 2 days).')
						,df_tag('p', [], 'Thank you for your business!')
					])
				])
				,df_tag('div', 'toggled-fields', [
					$this->text(S::name(), S::name(true))
					,$this->text(S::dba(), S::dba(true))
					,$this->select(
						S::type()
						,'What type of business do you run?'
						,sType::s()->keys()
						,['placeholder' => sType::PLACEHOLDER]
					)
					,$this->text('number_of_locations', 'Number of Locations')
					,$this->text('tax', 'TAX ID')
					,$this->text('phone', 'Phone Number', '(888) 555-5555')
					,$this->textarea('address', 'Storefront Business Address')
					,$this->text('city', 'City')
					,$this->text('postcode', 'Zip Code')
					,$this->region()
					,$this->regionJS()
					,$this->country()
					,$this->textarea('notes', 'Notes')
				])
			])
		]
	);}

	/**
	 * 2019-05-30
	 * @used-by _toHtml()
	 * @param $id
	 * @param $label
	 * @return string
	 */
	private function cb($id, $label) {return $this->e(Checkbox::class, $id, $label);}

	/**
	 * 2019-06-01
	 * @used-by _toHtml()
	 * @return string
	 */
	private function country() {return $this->e(Country::class, 'country', 'Country');}

	/**
	 * 2019-05-30
	 * @used-by cb()
	 * @used-by country()
	 * @used-by inline()
	 * @used-by region()
	 * @used-by text()
	 * @used-by textarea()
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
			+ ['html_id' => $id, 'label' => $label, 'name' => $id, 'placeholder' => 'please enter…']
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
	private function form() {return dfc($this, function() {return df_new_omd(Form::class, [
		'html_id_prefix' => self::id()
	]);});}

	/**
	 * 2019-05-30
	 * @used-by e()
	 * @return Renderer
	 */
	private function r() {return dfc($this, function() {return new Renderer;});}

	/**
	 * 2019-06-01
	 * @used-by _toHtml()
	 * @return string
	 */
	private function region() {return $this->e(Select2::class, 'region_id', 'State/Province', [
		'after' => df_tag('input', [
			'class' => df_cc_s('validate-not-number-first',
				df_address_h()->getAttributeValidationClass('region')
			)
			,'id' => self::id('region')
			,'name' => 'kingpalm_business_region'
			,'type' => 'text'
		])
		,Select2::EXTRA => ['placeholder' => 'Please select a region, state or province.']
		,'values' => df_a_to_options([''])
	]);}

	/**
	 * 2019-06-01
	 * @used-by _toHtml()
	 * @return string
	 */
	private function regionJS() {return df_js_x([self::idS('country') => ['regionUpdater' => [
		'countriesWithOptionalZip' => df_directory()->getCountriesWithOptionalZip(true)
		,'defaultRegion' => ''
		,'form' => '#form-validate'
		,'optionalRegionAllowed' => true
		,'postcodeId' => self::idS('postcode')
		,'regionInputId' => self::idS('region')
		,'regionJson' => df_json_decode(df_directory()->getRegionJson())
		,'regionListId' => self::idS('region_id')
	]]]);}

	/**
	 * 2019-05-30
	 * @used-by _toHtml()
	 * @param string $id
	 * @param string $label
	 * @param string[] $o
	 * @param array(string => mixed) $extra [optional]
	 * @return string[]
	 */
	private function select($id, $label, array $o, $extra = []) {return $this->e(Select2::class, $id, $label, [
		Select2::EXTRA => $extra, 'values' => df_a_to_options($o)
	]);}

	/**
	 * 2019-05-31 Currently, it is not used.
	 * @return string|null
	 */
	private function tax() {
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
	 * @used-by _toHtml()
	 * @param string $id
	 * @param string $label
	 * @param string|null $placeholder [optional]
	 * @param array(string => mixed) $d [optional]
	 * @return string
	 */
	private function text($id, $label, $placeholder = null, $d = []) {return $this->e(
		Text::class, $id, $label, $d + df_clean(['placeholder' => $placeholder])
	);}

	/**
	 * 2019-05-31
	 * @used-by _toHtml()
	 * @param string $id
	 * @param string $label
	 * @return string
	 */
	private function textarea($id, $label) {return $this->e(Textarea::class, $id, $label);}

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

	/**
	 * 2019-06-04
	 * @used-by form()
	 * @used-by idS()
	 * @used-by region()
	 * @param string $v [optional]
	 * @return string
	 */
	private static function id($v = '') {return "kingpalm-b2b-$v";}

	/**
	 * 2019-06-04
	 * @used-by regionJS()
	 * @param string $v [optional]
	 * @return string
	 */
	private static function idS($v) {return '#' . self::id($v);}
}