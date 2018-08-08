<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HotelExpenseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-expense-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TGIid') ?>

    <?= $form->field($model, 'FromDate') ?>

    <?= $form->field($model, 'ToDate') ?>

    <?= $form->field($model, 'NameOfHotel') ?>

    <?php // echo $form->field($model, 'StayAmount') ?>

    <?php // echo $form->field($model, 'FoodAmount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
