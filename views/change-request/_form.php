<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChangeRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="change-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RaisedById')->textInput() ?>

    <?= $form->field($model, 'RaisedEmpCode')->textInput() ?>

    <?= $form->field($model, 'OldInTime')->textInput() ?>

    <?= $form->field($model, 'OldOutTime')->textInput() ?>

    <?= $form->field($model, 'NewInTime')->textInput() ?>

    <?= $form->field($model, 'NewOutTime')->textInput() ?>

    <?= $form->field($model, 'Resolved')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
