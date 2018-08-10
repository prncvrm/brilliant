<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TravelFinal */

$this->title = 'Update Travel Final: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Travel Finals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="travel-final-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
