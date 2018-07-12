<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-index">

    <p>
        <?= Html::a('Create New Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'value',
            'label'=>'Role Name',   
            ],
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
