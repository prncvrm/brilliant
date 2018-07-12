<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendance In View';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Date',
            'Time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>