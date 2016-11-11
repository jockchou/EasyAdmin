<?php
/**
 * JockChou (http://jockchou.github.io)
 *
 * @link      https://github.com/jockchou
 * @copyright Copyright (c) 2016 JockChou
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt (Apache License)
 */

namespace app\controllers;


use yii\web\Controller;

class ViewController extends Controller
{
    public function actionWidget()
    {
        return $this->render("widget");
    }
}