<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegisterForm is the model behind the register form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $retypePassword;
    public $agreeTerms = false;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'retypePassword'], 'required'],
            ['email', 'email'],
            ['agreeTerms', 'compare', 'compareValue' => '1', 'operator' => '==', 'message' => '必须同意注册协议。'],
            ['password', 'compare', 'compareAttribute' => 'retypePassword']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用戶名',
            'email' => '邮箱',
            'password' => '密码',
            'retypePassword' => '确认密码',
            'agreeTerms' => '同意注册协议'
        ];
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            $this->_user = $user;
        }

        return $this->_user;
    }

    public function saveUser()
    {
        $user = $this->getUser();
        if (!$user->save()) {
            $this->addErrors($user->getErrors());

            return false;
        }

        return $user;
    }
}
