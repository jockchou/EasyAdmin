<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\Box;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '角色管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <p>
        <?= Html::a(Yii::t('app', '新建'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Box::begin([
        'footer' => false,
        'headerOptions' => ['title' => '角色列表']
    ]); ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description:ntext',
            'rule_name',
            'data:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => ['class' => 'table table-bordered table-hover dataTable', ['rolie']],
        'pager' => ['options' => ['class' => 'pagination pagination-sm no-margin pull-right']]
    ]); ?>
    <?php Pjax::end(); ?>
    <?php Box::end(); ?>
</div>
