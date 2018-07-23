<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TimeSlots */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="time-slots-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'InTime')->textInput() ?>

    <?= $form->field($model, 'OutTime')->textInput() ?>

    <?= $form->field($model, 'Grace')->textInput() ?>

    <?= $form->field($model, 'DeadOut')->textInput() ?>

    <?= $form->field($model, 'MaxDeadOutCount')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
