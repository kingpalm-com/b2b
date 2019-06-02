<?php
namespace KingPalm\B2B;
use Df\Framework\Form\Element as E;
use Magento\Framework\Data\Form\Element\AbstractElement as AE;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface as IRenderer;
/**
 * 2019-05-30
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 * @see \Df\Framework\Form\Element\Renderer\Inline
 */
class Renderer implements IRenderer {
	/**
	 * 2019-05-30
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see \Magento\Framework\Data\Form\Element\Renderer\RendererInterface::render()
	 * @used-by vendor/kingpalm/b2b/view/frontend/templates/registration.phtml
	 * @param AE|E $e
	 * @return string
	 */
	function render(AE $e) {
		$labelAtRight = E::shouldLabelBeAtRight($e); /** @var bool $labelAtRight */
		$innerA = [$this->label($e), $e->getElementHtml(), $e['after']];  /** @var string[] $innerA */
		if ($labelAtRight) {
			$innerA = array_reverse($innerA);
		}
		return df_tag('div',
			df_cc_s(
				/**
				 * 2015-12-11
				 * Класс .field для элементов внутри inline fieldset не добавляю намеренно:
				 * слишком уж много стилей ядро связывает с этим классом, и это чересчур ломает мою вёрстку.
				 * Но система добавляет это класс, когда поле находится не внутри inline fieldset.
				 * Мы же вместо .field опираемся на наш селектор .df-field,
				 * который мы добавляем как к инлайновым полям, так и к блочным:
				 * @see \Df\Backend\Block\Widget\Form\Renderer\Fieldset\Element::outerCssClasses()
				 * https://github.com/mage2pro/core/tree/489029cab0b8be03e4a79f0d33ce9afcdec6a76c/Backend/Block/Widget/Form/Renderer/Fieldset/Element.php#L189
				 */
				'df-field'
				,E::getClassDfOnly($e)
				,$e->getContainerClass() // 2015-11-23 Моё добавление.
			)
			,implode($innerA)
		);
	}

	/**
	 * 2019-05-30
	 * @used-by render()
	 * @param AE|E $e
	 * @return string|null
	 */
	private function label(AE $e) {
		$l = $e['label']; /** @var string|null $l */
		return !$l ? null : df_tag('label', [
			'class' => E::shouldLabelBeAtRight($e) ? 'addafter' : 'addbefore', 'for' => $e->getHtmlId()
		], $l);
	}
}