<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TimeSlots;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index" style="font-size:12px;">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'EmployeeCode',
            'EmployeeName',
            'DeviceName',
            'MacAddress',
            ['attribute'=>'Designation',
            'enableSorting'=>true,
            'value'=>function($model){
                if($model->Designation==null)
                    return null;
                return app\models\UserType::findAll(['id'=>$model->Designation])[0]['value'];
            }
            ],
            ['attribute'=>'Branch',
            'enableSorting' => true,
            'value'=>function($model){
                return app\models\Branch::findAll(['id'=>$model->Branch])[0]["value"];

            },
            ],
            ['attribute'=>'TimeSlot',
            'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN,
            'value'=>function($model){

                return TimeSlots::findAll(['id'=>$model->TimeSlot])[0]['InTime']." - ".TimeSlots::findAll(['id'=>$model->TimeSlot])[0]['OutTime'];
            }], 
            ['class' => 'yii\grid\ActionColumn',
            'visible'=>Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN,
            'template'=>'{update}{view}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-calendar"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Attendance')]);
                }
            ],

            ],
            ['class' => 'yii\grid\ActionColumn',
            'visible'=>Yii::$app->user->identity->UserType>=app\models\Users::ROLE_MODERATOR,
            'template'=>'{update}{view}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-calendar"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Attendance')]);
                }
            ],

            ],
        ],
    ]); ?>
</div>
