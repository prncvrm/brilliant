<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MonthOffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Month Off';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="month-off-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Month Off', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'BranchId',
            'label'=>"Branch",
            'value'=>function($model){
                return app\models\Branch::findAll(['id'=>$model->BranchId])[0]['value'];
            }
            ],
            'Dates',
            'Month',
            ['attribute'=>'Year',
            'value'=>function($model){
                return app\models\Years::findAll(['id'=>$model->Year])[0]['Year'];
            }],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update}{delete}'],
        ],
    ]); ?>
</div>
