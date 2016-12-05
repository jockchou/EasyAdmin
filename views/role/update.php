<?php

use yii\helpers\Html;
use app\widgets\Box;

/* @var $this yii\web\View */

$this->title = Yii::t('app', '更新角色');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '角色管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '更新角色');
?>
<div class="role-update">
    <div class="col-md-6">
        <?php Box::begin([
            'footer' => false,
            'headerOptions' => ['title' => '角色信息']
        ]); ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        <?php Box::end(); ?>
    </div>
</div>
