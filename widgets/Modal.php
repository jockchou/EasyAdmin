<?php
/**
 * JockChou (http://jockchou.github.io)
 *
 * @link      https://github.com/jockchou
 * @copyright Copyright (c) 2016 JockChou
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt (Apache License)
 */

namespace app\widgets;

use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class Modal extends Widget
{
    const SIZE_LARGE = "modal-lg";
    const SIZE_SMALL = "modal-sm";

    const STYLE_PRIMARY = "modal-primary";
    const STYLE_INFO = "modal-info";
    const STYLE_WARNING = "modal-warning";
    const STYLE_SUCCESS = "modal-success";
    const STYLE_DANGER = "modal-danger";

    public $header;
    public $headerOptions;
    public $footer;
    public $footerOptions;
    public $size = "";
    public $closeButton = [];
    public $toggleButton = false;
    public $style = "";

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        $this->initOptions();

        echo $this->renderToggleButton() . "\n";
        echo Html::beginTag('div', $this->options) . "\n";
        echo Html::beginTag('div', ['class' => 'modal-dialog ' . $this->size]) . "\n";
        echo Html::beginTag('div', ['class' => 'modal-content']) . "\n";
        echo $this->renderHeader() . "\n";
        echo $this->renderBodyBegin() . "\n";
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo "\n" . $this->renderBodyEnd();
        echo "\n" . $this->renderFooter();
        echo "\n" . Html::endTag('div'); // modal-content
        echo "\n" . Html::endTag('div'); // modal-dialog
        echo "\n" . Html::endTag('div');

        $this->registerPlugin('modal');
    }

    /**
     * Renders the header HTML markup of the modal
     * @return string the rendering result
     */
    protected function renderHeader()
    {
        $button = $this->renderCloseButton();
        if ($button !== null) {
            $this->header = $button . "\n" . $this->header;
        }
        if ($this->header !== null) {
            Html::addCssClass($this->headerOptions, ['widget' => 'modal-header']);

            return Html::tag('div', "\n" . $this->header . "\n", $this->headerOptions);
        } else {
            return null;
        }
    }

    /**
     * Renders the opening tag of the modal body.
     * @return string the rendering result
     */
    protected function renderBodyBegin()
    {
        return Html::beginTag('div', ['class' => 'modal-body']);
    }

    /**
     * Renders the closing tag of the modal body.
     * @return string the rendering result
     */
    protected function renderBodyEnd()
    {
        return Html::endTag('div');
    }

    /**
     * Renders the HTML markup for the footer of the modal
     * @return string the rendering result
     */
    protected function renderFooter()
    {
        if ($this->footer !== null) {
            Html::addCssClass($this->footerOptions, ['widget' => 'modal-footer']);

            return Html::tag('div', "\n" . $this->footer . "\n", $this->footerOptions);
        } else {
            return null;
        }
    }

    /**
     * Renders the toggle button.
     * @return string the rendering result
     */
    protected function renderToggleButton()
    {
        if (($toggleButton = $this->toggleButton) !== false) {
            $tag = ArrayHelper::remove($toggleButton, 'tag', 'button');
            $label = ArrayHelper::remove($toggleButton, 'label', 'Show');
            if ($tag === 'button' && !isset($toggleButton['type'])) {
                $toggleButton['type'] = 'button';
            }

            return Html::tag($tag, $label, $toggleButton);
        } else {
            return null;
        }
    }

    /**
     * Renders the close button.
     * @return string the rendering result
     */
    protected function renderCloseButton()
    {
        if (($closeButton = $this->closeButton) !== false) {
            $tag = ArrayHelper::remove($closeButton, 'tag', 'button');
            $label = ArrayHelper::remove($closeButton, 'label', '&times;');
            $ariaHidden = ArrayHelper::remove($closeButton, 'aria-hidden', 'true');
            if ($tag === 'button' && !isset($closeButton['type'])) {
                $closeButton['type'] = 'button';
            }
            $spanTag = Html::tag('span', $label, ['aria-hidden' => $ariaHidden]);

            return Html::tag($tag, $spanTag, $closeButton);
        } else {
            return null;
        }
    }

    /**
     * Initializes the widget options.
     * This method sets the default values for various options.
     */
    protected function initOptions()
    {
        if ($this->header === null) {
            $this->header = '<h4 class="modal-title">系统提示</h4>';
        }

        if ($this->footer === null) {
            $leftClass = "btn pull-left";
            $rightClass = "btn";
            if ($this->style != "") {
                $leftClass .= " btn-outline";
                $rightClass .= " btn-outline";
            } else {
                $leftClass .= " btn-default";
                $rightClass .= " btn-primary";
            }
            $leftBtn = Html::tag("button", '关闭', ['class' => $leftClass, 'data-dismiss' => 'modal']);
            $rightBtn = Html::tag("button", '保存', ['class' => $rightClass]);

            $this->footer = $leftBtn . "\n" . $rightBtn;
        }

        $this->options = array_merge([
            'class' => 'fade ' . $this->style,
            'role' => 'dialog',
            'tabindex' => -1,
        ], $this->options);

        Html::addCssClass($this->options, ['widget' => 'modal']);

        if ($this->clientOptions !== false) {
            $this->clientOptions = array_merge(['show' => false], $this->clientOptions);
        }

        if ($this->closeButton !== false) {
            $this->closeButton = array_merge([
                'data-dismiss' => 'modal',
                'aria-hidden' => 'true',
                'aria-label' => 'Close',
                'class' => 'close',
            ], $this->closeButton);
        }

        if ($this->toggleButton !== false) {
            $this->toggleButton = array_merge([
                'data-toggle' => 'modal',
            ], $this->toggleButton);
            if (!isset($this->toggleButton['data-target']) && !isset($this->toggleButton['href'])) {
                $this->toggleButton['data-target'] = '#' . $this->options['id'];
            }
        }
    }
}