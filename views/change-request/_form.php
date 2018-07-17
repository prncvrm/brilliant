<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
/* @var $this yii\web\View */
/* @var $model app\models\ChangeRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="change-request-form" style="margin:30px;padding:30px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Date')->textInput(['disabled'=>true]) ?>
    <?= $form->field($model, 'OldInTime')->textInput() ?>

    <?= $form->field($model, 'OldOutTime')->textInput() ?>

    <?= $form->field($model, 'NewInTime')->textInput() ?>

    <?= $form->field($model, 'NewOutTime')->textInput() ?>

    
    <div class="form-group">
        <?= Html::submitButton('Submit Request', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
