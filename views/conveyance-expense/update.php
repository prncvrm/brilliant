<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConveyanceExpense */

$this->title = 'Update Conveyance Expense: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Conveyance Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conveyance-expense-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
