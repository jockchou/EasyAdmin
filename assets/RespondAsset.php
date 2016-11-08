<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RespondAsset extends AssetBundle
{
    public $sourcePath = '@vendor/rogeriopradoj/respond/dest';
    public $css = [
        'respond.min.js'
    ];
    public $cssOptions = ['condition' => 'lt IE9'];
}
