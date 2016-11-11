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

class Box extends Widget
{
    const STYLE_DEFAULT = "box-default";
    const STYLE_PRIMARY = "box-primary";
    const STYLE_INFO = "box-info";
    const STYLE_WARNING = "box-warning";
    const STYLE_SUCCESS = "box-success";
    const STYLE_DANGER = "box-danger";

    public $header;
    public $headerOptions;

    public $footer;
    public $footerOptions;

    public $tools = false;

    public $style = self::STYLE_DEFAULT;

    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, ['widget' => 'box']);

        if (!empty($this->style)) {
            Html::addCssClass($this->options, $this->style);
        }

        echo Html::beginTag('div', $this->options) . "\n";
        echo $this->renderHeader() . "\n";
        echo $this->renderBodyBegin() . "\n";

    }


    protected function renderHeader()
    {
        if ($this->header !== false) {
            Html::addCssClass($this->headerOptions, ['widget' => 'box-header with-border']);

            if ($this->header === null) {
                $this->header = $this->renderTitle() . "\n" . $this->renderTools();
            }

            return Html::tag('div', "\n" . $this->header . "\n", $this->headerOptions);
        } else {
            return null;
        }
    }

    protected function renderBodyBegin()
    {
        return Html::beginTag('div', ['class' => 'box-body']);
    }

    protected function renderBodyEnd()
    {
        return Html::endTag('div');
    }

    protected function renderFooter()
    {
        if ($this->footer !== false) {
            Html::addCssClass($this->footerOptions, ['widget' => 'box-footer']);

            return Html::tag('div', "\n" . $this->footer . "\n", $this->footerOptions);
        } else {
            return null;
        }
    }

    protected function renderTools()
    {
        if ($this->tools !== false) {
            return Html::tag('div', "\n" . $this->tools . "\n", ['class' => 'box-tools pull-right']);
        } else {
            return null;
        }
    }

    protected function renderTitle()
    {
        if ($this->headerOptions !== false) {
            $title = ArrayHelper::remove($this->headerOptions, 'title', '');

            return Html::tag("h3", $title, ['class' => 'box-title']);
        } else {
            return null;
        }
    }

    public function run()
    {
        echo "\n" . $this->renderBodyEnd();
        echo "\n" . $this->renderFooter();
        echo "\n" . Html::endTag('div');
    }


}