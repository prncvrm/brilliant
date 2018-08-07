<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelGeneralInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Travel General Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-general-information-index">

    
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'EmployeeId',
            'label'=>'Employee Code',
            'value'=>function($model){
                return \app\models\Employee::findOne(['id'=>$model->EmployeeId])->EmployeeCode;
            }],
            ['attribute'=>'EmployeeId',
            'label'=>'Employee Name',
            'value'=>function($model){
                return \app\models\Employee::findOne(['id'=>$model->EmployeeId])->EmployeeName;
            }],
            'PurposeOfTour',
            ['attribute'=>'Location',
            'value'=>function($model){
                return app\models\Branch::findOne(['id'=>$model->Location])->value;
            }],
            'From',
            'To',
            [
                'name'=>'Remark',
                'type'=>'raw',
                'value'=>'CHtml::textField("sortOrder[$data->menuId]",$data->sortOrder,array("style"=>"width:50px;"))',
                'htmlOptions'=>'["width"=>"50px"]',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
