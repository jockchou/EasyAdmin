<?php
/**
 * JockChou (http://jockchou.github.io)
 *
 * @link      https://github.com/jockchou
 * @copyright Copyright (c) 2016 JockChou
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt (Apache License)
 */

namespace app\filters;


use yii\base\ActionFilter;

class LoginCheckFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            \Yii::$app->controller->redirect('/site/login');
        } else {
            return parent::beforeAction($action);
        }
    }
}