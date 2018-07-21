<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Employee;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'UserName',
            'UserEmailId:email',
            //'UserPassword',
            ['attribute'=>'Employee',
            'value'=>function($model){
                $emp = Employee::findAll(['id'=>$model->Employee])[0];
                return $emp['EmployeeName'];
            }
            ],
            ['attribute'=>'UserType',
            'label'=>'User Type',
             'contentOptions' => ['class'=>'badge badge-success'],
            
            'value'=>function($model){
                return app\models\UserType::findAll(['id'=>$model->UserType])[0]['value'];
            },
            ],
            'LastLogin',
            ['attribute'=>'Status',
            'contentOptions' => ['class'=>'badge badge-success'],
            'value'=>function($model){
                switch($model->Status){
                    case 0:
                        return "De-Active";
                    case 1:
                        return "Active";
                }

            },
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update} {delete} {view}',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-off"></span>', yii\helpers\Url::to(['users/switch-active', 'id'=>$model->id]),['title'=>Yii::t('app','Active'),'data-confirm'=>'Switch to Active/Deactive','data-method'=>'POST']);
                }
            ],

            ],
        ],
    ]); ?>
</div>
