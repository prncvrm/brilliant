<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FareExpense */

$this->title = 'Update Fare Expense: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fare Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fare-expense-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
