<?php
use app\widgets\InfoBox;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */

$this->title = '小部件展示';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <?= InfoBox::widget([]); ?>
    </div>
</div>


<?php Modal::begin([
     //'header' => '<h4 class="modal-title">Hello world</h4>',
     //'footer' => '<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           // <button type="button" class="btn btn-primary">Save changes</button>',
     'toggleButton' => ['label' => 'click me'],
]);?>

echo 'Say hello...';

<?php Modal::end();?>
