<?php
use app\widgets\InfoBox;
use app\widgets\Modal;
use app\widgets\Box;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$this->title = '小部件展示';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-6">
        <?php Modal::begin([
            'id' => 'myModal',
            'toggleButton' => ['label' => 'click me']
        ]); ?>

        欢迎使用EasyAdmin<br>
        欢迎使用EasyAdmin<br>
        欢迎使用EasyAdmin<br>
        欢迎使用EasyAdmin<br>

        <?php Modal::end(); ?>
    </div>

    <div class="col-md-6">
        <?= InfoBox::widget([]); ?>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(['id' => 'register-form', 'enableClientValidation' => true]); ?>
        <?= $form
            ->field($model, 'email')
            ->label(true)
            ->textInput() ?>

        <?= $form
            ->field($model, 'email')
            ->label(true)
            ->textInput() ?>

        <?= $form
            ->field($model, 'password')
            ->label(true)
            ->passwordInput()
        ?>
        <?php ActiveForm::end() ?>
    </div>

    <div class="col-md-6">
        <?php Box::begin(); ?>

        欢迎使用EasyAdmin<br>
        欢迎使用EasyAdmin<br>
        欢迎使用EasyAdmin<br>

        <?php Box::end(); ?>
    </div>
</div>



