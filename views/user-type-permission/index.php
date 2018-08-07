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
    
    
</div>
