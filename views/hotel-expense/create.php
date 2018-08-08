<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HotelExpense */

$this->title = 'Create Hotel Expense';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-expense-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
