<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimeSlotsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Time Slots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-slots-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Time Slots', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

  //          'id',
            'InTime',
            'OutTime',
            'Grace',
            'DeadOut',
            'MaxDeadOutCount',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update}'
            ],
        ],
    ]); ?>
</div>
