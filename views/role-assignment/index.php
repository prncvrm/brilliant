<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Users;
use app\models\UserType;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RoleAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Assigner Details';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="role-assignment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'label'=>'Permissions',
             //'contentOptions' => ['class'=>'badge badge-success'],
             'value'=>function($model) use($_model){
                $UserType=\yii\helpers\ArrayHelper::map(UserType::find()->all(),'id','value');
                $rtn =" ";
                if(array_key_exists($model->id,(\yii\helpers\ArrayHelper::map($_model->roles, 'id', 'UserType','Users')))){
                foreach((\yii\helpers\ArrayHelper::map($_model->roles, 'id', 'UserType','Users')[$model->id]) as $ty)
                    $rtn=$rtn.", ||".$UserType[$ty]." ||"; 
                    
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
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>','add-role?id='.$model->id,['title'=>'Configure']);
                }
            ],
            ],
        ],
    ]); ?>
</div>
