<?php
/**
 * JockChou (http://jockchou.github.io)
 *
 * @link      https://github.com/jockchou
 * @copyright Copyright (c) 2016 JockChou
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt (Apache License)
 */

namespace app\widgets;


use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;

class InfoBox extends Widget
{
    public $icon = 'envelope-o';
    public $color = 'bg-aqua';
    public $text = 'InfoBox';
    public $number = '1,000';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        BootstrapAsset::register($this->getView());

        return Html::tag('div', $this->renderBoxIcon() . $this->renderBoxContent(), ['class' => 'info-box']);
    }

    private function renderBoxIcon()
    {
        $icon = Html::tag('i', '', ['class' => 'fa fa-' . $this->icon]);

        return Html::tag('span', $icon, ['class' => 'info-box-icon ' . $this->color]);
    }

    private function renderBoxContent()
    {
        $textTag = Html::tag('span', $this->text, ['class' => 'info-box-text']);
        $numberTag = Html::tag('span', $this->number, ['class' => 'info-box-number']);

        return Html::tag('div', $textTag . $numberTag, ['class' => 'info-box-content']);
    }
}