<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeManagementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-management-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'EmployeeCode') ?>

    <?= $form->field($model, 'BusinessCode') ?>

    <?= $form->field($model, 'EmployeeStatus') ?>

    <?= $form->field($model, 'FirstName') ?>

    <?php // echo $form->field($model, 'MiddleName') ?>

    <?php // echo $form->field($model, 'LastName') ?>

    <?php // echo $form->field($model, 'FatherName') ?>

    <?php // echo $form->field($model, 'MotherName') ?>

    <?php // echo $form->field($model, 'Gender') ?>

    <?php // echo $form->field($model, 'BloodGroup') ?>

    <?php // echo $form->field($model, 'MaritalStatus') ?>

    <?php // echo $form->field($model, 'DateOfMarried') ?>

    <?php // echo $form->field($model, 'DateOfBirth') ?>

    <?php // echo $form->field($model, 'Age') ?>

    <?php // echo $form->field($model, 'DateOfJoining') ?>

    <?php // echo $form->field($model, 'ConfirmationDate') ?>

    <?php // echo $form->field($model, 'Branch') ?>

    <?php // echo $form->field($model, 'ParentDeparment') ?>

    <?php // echo $form->field($model, 'Department') ?>

    <?php // echo $form->field($model, 'Designation') ?>

    <?php // echo $form->field($model, 'Level') ?>

    <?php // echo $form->field($model, 'Grade') ?>

    <?php // echo $form->field($model, 'EmployeeCategory') ?>

    <?php // echo $form->field($model, 'ProTaxLocation') ?>

    <?php // echo $form->field($model, 'Process') ?>

    <?php // echo $form->field($model, 'PANCard') ?>

    <?php // echo $form->field($model, 'AadharNumber') ?>

    <?php // echo $form->field($model, 'PassportNumber') ?>

    <?php // echo $form->field($model, 'MobileNo') ?>

    <?php // echo $form->field($model, 'AlternateMobileNo') ?>

    <?php // echo $form->field($model, 'PersonalEmailId') ?>

    <?php // echo $form->field($model, 'OfficialEmailId') ?>

    <?php // echo $form->field($model, 'Metro/NonMetro') ?>

    <?php // echo $form->field($model, 'TerminationDate') ?>

    <?php // echo $form->field($model, 'LastWorkingDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
