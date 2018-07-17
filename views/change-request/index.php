<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChangeRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Change Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-request-index">

   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            ["attribute"=>'RaisedById',
            'value'=>function($model){
                return app\models\Users::findAll(['id'=>$model->RaisedById])[0]['UserName'];
            }],
            ["attribute"=>'RaisedEmpCode',
            'value'=>function($model){
                return app\models\Employee::findAll(['id'=>$model->RaisedEmpCode])[0]['EmployeeName']."(".app\models\Employee::findAll(['id'=>$model->RaisedEmpCode])[0]['EmployeeCode'].")";
            }],
            'Date',
            'OldInTime',
            'OldOutTime',
            'NewInTime',
            'NewOutTime',
            'Reason',
            ['attribute'=>'Resolved',
            'value'=>function($model){
                switch($model->Resolved){
                    case 0:
                         return ("X");
                    case 1:
                         return ("Resolved");
                }
            }
            ],

             ['class' => 'yii\grid\ActionColumn',
            'template'=>'{approve} {delete}',
            'buttons'=>[
                'approve'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', yii\helpers\Url::to(['change-request/approve', 'id'=>$model->id]),['title'=>Yii::t('app','Approve'),'data-confirm'=>'Are you sure you want to Approve this?','data-method'=>'POST']);
                },
/*                'delete'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Reject')]);
                }*/
            ],

            ],
        ],
    ]); ?>
</div>
