<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelFinalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Travel Finals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-final-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Travel Final', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'TGIid',
            'AdvanceTaken',
            'Sanctioned',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
