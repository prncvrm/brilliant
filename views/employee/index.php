<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'EmployeeCode',
            'EmployeeName',
            'DeviceName',
            'MacAddress',
            ['attribute'=>'Branch',
            'enableSorting' => true,
            'value'=>function($model){
                return app\models\Branch::findAll(['id'=>$model->Branch])[0]["value"];

            },
            ],

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
            'visible'=>Yii::$app->user->identity->UserType==app\models\Users::ROLE_MODERATOR,
            'template'=>'{view}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-calendar"></span>', yii\helpers\Url::to(['attendance-in/attendance-in-view', 'AttendanceInSearch[EmployeeId]'=>$model->id,'AttendanceInSearch[Month]'=>date("m"),'AttendanceInSearch[Year]'=>date("Y")]),['title'=>Yii::t('app','Attendance')]);
                }
            ],

            ],
        ],
    ]); ?>
</div>
