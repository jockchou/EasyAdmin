<?php
/**
 * JockChou (http://jockchou.github.io)
 *
 * @link      https://github.com/jockchou
 * @copyright Copyright (c) 2016 JockChou
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt (Apache License)
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionRoles()
    {
        $authManager = Yii::$app->authManager;

        $roles = $authManager->getRoles();

        return $this->render('roles', [
            'roles' => $roles,
        ]);
    }
}