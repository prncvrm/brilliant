<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\EmployeeManagement;
use app\models\UserType;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">New User</a></li>
              
              <!-- 
            <li><a href="#employeeDetails" data-toggle="tab">Employee Details</a></li>
              <li><a href="#personalDetails" data-toggle="tab">Personal Details</a></li>
              <li><a href="#eduationalDetails" data-toggle="tab">Educational Details</a></li>
              <li><a href="#emergencyContactDetails" data-toggle="tab">Emergency Contact Details</a></li>
              <li><a href="#employeeLanguageDetails" data-toggle="tab">Employee Language Details</a></li>
              <li><a href="#employeeFamilyDetails" data-toggle="tab">Employee Family Details</a></li>
              <li><a href="#employeeNomineeDetails" data-toggle="tab">Employee Nominee Details</a></li>

              -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row"><div class="col-md-6">
    <?= $form->field($model, 'UserName')->textInput(['maxlength' => true]) ?>
    </div><div class="col-md-6">
    <?= $form->field($model, 'UserEmailId')->textInput(['maxlength' => true]) ?>
    </div></div>
    <div class="row"><div class="col-md-6">
    <?= $form->field($model, 'UserPassword')->textInput(['maxlength' => true]) ?>
    </div><div class="col-md-6">
    <?= $form->field($model, 'Employee')->dropDownList(
        ArrayHelper::map(EmployeeManagement::find()->all(),'id','FirstName'),
        ['prompt'=>'Select Employee']
    ) ?> 
    </div></div>
    <div class="row"><div class="col-md-6">
    <?= $form->field($model, 'UserType')->dropDownList(
        ArrayHelper::map(UserType::find()->all(),'id','value'),
        ['prompt'=>'Select User Type']
    ) ?> 
</div> </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


    
    


                </div>
</div>


              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              
              <!-- /.tab-pane -->
            </div>
</section>

