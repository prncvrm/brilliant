<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttendanceCriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendance Criterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-criteria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attendance Criteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'MinHoursCount',
            'MaxHoursCount',
            'Type:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
