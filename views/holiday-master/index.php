<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HolidayMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Holiday Master';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holiday-master-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Holiday', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'Name',
            'Date',
            'Type',
            'Reason',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
