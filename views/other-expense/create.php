<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OtherExpense */

$this->title = 'Create Other Expense';
$this->params['breadcrumbs'][] = ['label' => 'Other Expenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="other-expense-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
