<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeaveRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'RaisedById') ?>

    <?= $form->field($model, 'RaisedEmpId') ?>

    <?= $form->field($model, 'Reason') ?>

    <?= $form->field($model, 'Resolved') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
