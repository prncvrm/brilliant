<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HotelExpense */

$this->title = 'Update Hotel Expense: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-expense-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
