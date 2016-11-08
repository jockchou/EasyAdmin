<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = '注册';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>


<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Easy-Admin</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">用户注册</p>

        <?php $form = ActiveForm::begin(['id' => 'register-form', 'enableClientValidation' => true]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'email', $fieldOptions2)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions3)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
        ?>

        <?= $form
            ->field($model, 'retypePassword', $fieldOptions3)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('retypePassword')])
        ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'agreeTerms')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('注册', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'register-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <a href="/site/terms" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-book"></i>注册协议</a>
            <a href="/site/login" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-paper-plane"></i>已有账号</a>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->