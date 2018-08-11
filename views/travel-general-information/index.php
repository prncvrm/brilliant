<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            ['attribute'=>'Processed?',
            'value'=>function($model){
                switch($model->Approve){
                    case 0 :
                        return "No";
                    case 1:
                        return "Yes";
                }
            }],
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
            'template'=>'{approve} {disapprove}',
            'visible'=>Yii::$app->user->identity->AccessLevel==\app\models\Users::ROLE_ADMIN,
            'buttons'=>[
            'approve'=>function($url,$model){
                    return $model->Resolved == 0? Html::a('<span class="glyphicon glyphicon-ok"></span>', yii\helpers\Url::to(['travel-general-information/approve', 'id'=>$model->id]),['title'=>Yii::t('app','Approve'),'data-confirm'=>'Are you sure you want to Approve this?','data-method'=>'POST','data-pjax'=>"0"]):"";
                },
            'disapprove'=>function($url,$model){
                    return $model->Resolved == 0? Html::a('<span class="glyphicon glyphicon-remove"></span>', yii\helpers\Url::to(['travel-general-information/disapprove', 'id'=>$model->id]),['title'=>Yii::t('app','Approve'),'data-confirm'=>'Are you sure you want to Disapprove this?','data-method'=>'POST','data-pjax'=>"0"]):"";
                },
            ],
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{fare-expense}',
            'visible'=>Yii::$app->user->identity->AccessLevel==\app\models\Users::ROLE_MODERATOR,
            'buttons'=>[
            'fare-expense'=>function($url,$model){
                return $model->Approve==1 && $model->Completed==0?Html::a('<span class="glyphicon glyphicon-folder-open"></span>', yii\helpers\Url::to(['fare-expense/index', 'TGI_id'=>$model->id]),['title'=>Yii::t('app','Fare Expense')]):"";
            }
            ],
            ],
        ],
    ]); ?>
</div>
