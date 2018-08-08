<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FareExpense */

$this->title = 'Create Fare Expense';
$this->params['breadcrumbs'][] = ['label' => 'Fare Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fare-expense-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
