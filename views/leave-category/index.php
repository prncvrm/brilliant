<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeaveCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leave Category Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-category-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Leave Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Name',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
</div>
