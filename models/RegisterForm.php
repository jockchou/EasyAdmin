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
            // username and password are both required
            [['username', 'email', 'password', 'retypePassword'], 'required'],
            ['email', 'email'],
            // rememberMe must be a boolean value
            ['agreeTerms', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->password !== $this->retypePassword) {
                $this->addError($attribute, '两次密码不一致.');
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
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

}
