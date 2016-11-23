<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', '新建角色');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '角色管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
