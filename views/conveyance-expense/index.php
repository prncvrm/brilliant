<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConveyanceExpenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conveyance Expense';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-2">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
    <label>Purpose Of Travel : </label><br>
    <?= $GeneralInModel->PurposeOfTour;?><br>
    <label>From Date : </label><br>
    <?= $GeneralInModel->From;?><br>
    <label>To Date : </label><br>
    <?= $GeneralInModel->To;?><br>
</div>
</div>
</div>
</div>
<?= $this->render('_form', [
        'model' => $model, 'TGI_id'=>$GeneralInModel->id,
    ])?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Date',
            'FromPlace',
            'ToPlace',
            ['attribute'=>'Mode',
            'value'=>function($model){
                return \app\models\TravelMode::findOne(['id'=>$model->Mode])->value;
            }
            ],
            'Amount',

            ['class' => 'yii\grid\ActionColumn',
        'template'=>'{delete}'],
        ],
    ]); ?>
</div>
