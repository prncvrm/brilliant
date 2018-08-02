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

   <?php print_r(app\models\LeaveCategory::findOne(['id'=>1])->Name);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'EmployeeCode',
            'EmployeeName',
            'DeviceName',
            'MacAddress',
            ['attribute'=>'LeaveType',
            'enableSorting'=>false,
            'visible'=>Yii::$app->user->identity->AccessLevel<=app\models\Users::ROLE_ADMIN,
            'value'=>function($model){
                if ($model->LeaveType==null)
                    return null;
                return app\models\LeaveCategory::findOne(['id'=>$model->LeaveType])->Name;
            }
            ],
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
            'visible'=>Yii::$app->user->identity->AccessLevel<=app\models\Users::ROLE_ADMIN,
            'value'=>function($model){

                return TimeSlots::findAll(['id'=>$model->TimeSlot])[0]['InTime']." - ".TimeSlots::findAll(['id'=>$model->TimeSlot])[0]['OutTime'];
            }],
            ['attribute'=>'Active',
            'value'=>function($model){
                switch($model->Active){
                    case 0:
                        return "InActive";
                    case 1:
                        return "Active";
                }
            }
            ], 
            ['class' => 'yii\grid\ActionColumn',
            'visible'=>Yii::$app->user->identity->AccessLevel<=app\models\Users::ROLE_ADMIN,
            'template'=>'{update}{view}{switch-active}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-calendar"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Attendance')]);
                },
                'switch-active'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-off"></span>', yii\helpers\Url::to(['employee/switch-active', 'id'=>$model->id]),['title'=>Yii::t('app','Switch Active'),'data-confirm'=>'Are you sure you want to Switch Activness?','data-method'=>'POST','data-pjax'=>"0"]);   
                }
            ],

            ],
            ['class' => 'yii\grid\ActionColumn',
            'visible'=>Yii::$app->user->identity->AccessLevel==app\models\Users::ROLE_MODERATOR,
            'template'=>'{update}{view}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-calendar"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Attendance')]);
                }
            ],

            ],
            ['class' => 'yii\grid\ActionColumn',
            'visible'=>Yii::$app->user->identity->AccessLevel==app\models\Users::ROLE_USER,
            'template'=>'{view}{update}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-calendar"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Attendance')]);
                },
                'update'=>function($url,$model){
                    return ($model->MacAddress==null)?Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,['title'=>Yii::t('app','Update')]):"";
                }

            ],

            ],
        ],
    ]); ?>
</div>
