<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelGeneralInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Travel Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-general-information-index">

    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $columns=[
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
            ['attribute'=>'Grand Total',
            'value'=>function($model){ 
                return app\models\FareExpense::getTotal($model)+app\models\ConveyanceExpense::getTotal($model)+app\models\HotelExpense::getTotal($model)+app\models\OtherExpense::getTotal($model);
            },
            ],
            ['attribute'=>'Completed',
            'value'=>function($model){
                switch($model->Completed){
                    case 0 :
                        return "Incomplete";
                    case 1:
                        return "Complete";
                }
            }],

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{preview}{generatereport}',
            'buttons'=>[
            'generatereport'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-save-file"></span>', yii\helpers\Url::to(['travel-general-information/generatereport', 'id'=>$model->id,'preview'=>0]),['title'=>Yii::t('app','Report'),'target'=>'_blank']);
                },
            'preview'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', yii\helpers\Url::to(['travel-general-information/generatereport', 'id'=>$model->id,'preview'=>1]),['title'=>Yii::t('app','Preview Report'),'target'=>'_blank']);
                },
            ],
            ],
        ];?>
    <?=ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
        'exportConfig' => [
        ExportMenu::FORMAT_HTML => false,
        ExportMenu::FORMAT_TEXT => false,
        ExportMenu::FORMAT_EXCEL => false,
        ExportMenu::FORMAT_EXCEL_X => false, 
    ],
    ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
    ]); ?>
</div>