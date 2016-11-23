<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Box;

/* @var $this yii\web\View */

$this->title = '查看角色';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '角色管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-view">
    <p>
        <?= Html::a(Yii::t('app', '更新'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '你确定要删除这个角色?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php Box::begin([
        'footer' => false,
        'headerOptions' => ['title' => '角色信息']
    ]); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'rule_name',
            'data:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
    <?php Box::end(); ?>

</div>
