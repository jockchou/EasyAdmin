<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', '更新角色');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '角色管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', '更新角色');
?>
<div class="role-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
