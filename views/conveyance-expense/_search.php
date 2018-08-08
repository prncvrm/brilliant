<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConveyanceExpenseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conveyance-expense-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TGIid') ?>

    <?= $form->field($model, 'Date') ?>

    <?= $form->field($model, 'FromPlace') ?>

    <?= $form->field($model, 'ToPlace') ?>

    <?php // echo $form->field($model, 'Mode') ?>

    <?php // echo $form->field($model, 'Amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
