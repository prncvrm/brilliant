<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TravelGeneralInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-general-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'EmployeeId') ?>

    <?= $form->field($model, 'PurposeOfTour') ?>

    <?= $form->field($model, 'Location') ?>

    <?= $form->field($model, 'From') ?>

    <?php // echo $form->field($model, 'To') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
