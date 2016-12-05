<?php

use yii\helpers\Html;
use app\widgets\Box;

/* @var $this yii\web\View */

$this->title = Yii::t('app', '新建角色');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '角色管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">
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
