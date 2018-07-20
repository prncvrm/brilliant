<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserType;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserTypePermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Type Permissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-permission-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'UserName',
            /*['attribute'=>'UsersName',
            'label'=>'User Name',
            'value'=>function($model){
                return ;
            }
            ],*/
            
            ['attribute'=>'UserType',
            'label'=>'User Type',
             'contentOptions' => ['class'=>'badge badge-success'],
             'value'=>function($model) use($_model){
                $UserType=\yii\helpers\ArrayHelper::map(UserType::find()->all(),'id','value');
                $rtn =" "; 
                if(array_key_exists($model->id,(\yii\helpers\ArrayHelper::map($_model->usertype, 'id', 'UserType','Users')))){
                    foreach((\yii\helpers\ArrayHelper::map($_model->usertype, 'id', 'UserType','Users')[$model->id]) as $ty)
                        $rtn=$rtn.", ".$UserType[$ty]; 
                }
                return $rtn;
               // return $model->id;
            },
            ],

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template'=>'{update}',
            'buttons'=>[
                'update'=>function($url,$model){
                    //passing user id here to update
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>','add-branch?id='.$model->id,['title'=>'Configure']);
                }
            ],
            ],
        ],
    ]); ?>
</div>
