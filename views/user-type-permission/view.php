<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\UserTypePermission */
$this->title="Roles Permitted";
?>
<div class="user-type-permission-view">
    <div class="row">
    
    <div class="col-md-6">
        <h4>Permissions Applicable</h4>
     <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['attribute'=>'Branch',
        'value'=>function($data){
            return app\models\Branch::findOne(['id'=>$data['Branch']])->value;
        },
        ],
        ['attribute'=>'UserTye',
        'value'=>function($data){
            return app\models\UserType::findOne(['id'=>$data['UserType']])->value;
        },
        ],        

        
    ],
    ]); ?>
    </div>
    <div class="col-md-6">
        <h4>Permissions Granted</h4>
        
        <?= GridView::widget([
    'dataProvider' => $dataProviderAllowed,
        'columns' => [
            'id',
            ['attribute'=>'Branch',
            'value'=>function($model){
                return app\models\Branch::findOne(['id'=>$model->Branch])->value;
            }],
            ['attribute'=>'UserType',
            'value'=>function($model){
                return app\models\UserType::findOne(['id'=>$model->UserType])->value;
            }],
             ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}',
        ],
        ],        

        
    ]); ?>
    </div>
    <?= Html::a('Add All Permission', ['user-type-permission/add-all-applicable','user_id'=>Yii::$app->request->queryParams['user_id']], ['class'=>'btn btn-primary']) ?>
    </div>

</div>
