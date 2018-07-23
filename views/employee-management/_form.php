<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\BloodGroup;
use app\models\Gender;
use app\models\ParentDepartment;
use app\models\Branch;
use app\models\Department;
use app\models\Designation;
use app\models\Grade;
use app\models\Level;
use app\models\MaritalStatus;
use app\models\EmployeeCategory;
use app\models\ProTaxLocation;
use app\models\Process;
use app\models\MetroNonMetro;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeManagement */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive " src= <?=$model->ProfileImage!=''? '../'.$model->ProfileImage:'../img/nobody_m_1024x1024.jpg'?> alt="User profile picture">

              <h3 class="profile-username text-center"><?=$model->FirstName." ".$model->MiddleName." ".$model->LastName?></h3>

              <p class="text-muted text-center"><?=$model->Designation!=""?Designation::findAll(['id'=>$model->Designation])[0]["value"]:""?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Birthday</b> <a class="pull-right"><?=$model->DateOfBirth?></a>
                </li>
                <li class="list-group-item">
                  <b>Anniversary</b> <a class="pull-right"><?=$model->DateOfMarried?></a>
                </li>
                <li class="list-group-item">
                  <b>Shift Details</b> <a class="pull-right"></a>
                </li>
              </ul>
              <?=$form->field($model, 'ProfileImage_file')->fileInput(['class'=>'btn btn-primary btn-block'])?>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">General Information</a></li>
              <li><a href="#" data-toggle="tab">Employee Details</a></li>
              <li><a href="#" data-toggle="tab">Personal Details</a></li>
              <li><a href="#" data-toggle="tab">Educational Details</a></li>
              <li><a href="#" data-toggle="tab">Emergency Contact Details</a></li>
              <li><a href="#" data-toggle="tab">Employee Language Details</a></li>
              <li><a href="#" data-toggle="tab">Employee Family Details</a></li>
              <li><a href="#" data-toggle="tab">Employee Nominee Details</a></li>
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
                <div class="employee-management-form">

    
    <div class="row">
    <div class="col-md-4">
    <?= $form->field($model, 'EmployeeCode')->textInput(['maxlength' => true,'placeholder'=>'Auto Generated','readOnly'=>true]) ?>
    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'BusinessCode')->textInput(['maxlength' => true,'placeholder'=>'Auto Generated','readOnly'=>true]) ?>
    </div><div class="col-md-4">
  
    <?= $form->field($model, 'EmployeeStatus')->textInput(['maxlength' => true,'placeholder'=>'Auto Generated','readOnly'=>true]) ?>
    </div></div>
    <div class="row">
        <div class="col-md-4">
    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">

    <?= $form->field($model, 'MiddleName')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

    <?= $form->field($model, 'FatherName')->textInput(['maxlength' => true]) ?>
</div> <div class="col-md-6">
    <?= $form->field($model, 'MotherName')->textInput(['maxlength' => true]) ?>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'Gender')->dropDownList(
        ArrayHelper::map(Gender::find()->all(),'id','value'),
        ['prompt'=>'Select Gender']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'BloodGroup')->dropDownList(
        ArrayHelper::map(BloodGroup::find()->all(),'id','value'),
        ['prompt'=>'Select Blood Group']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'MaritalStatus')->dropDownList(
        ArrayHelper::map(MaritalStatus::find()->all(),'id','value'),
        ['prompt'=>'Select Marital Status']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'DateOfMarried')->textInput(['maxlength' => true,'class'=>'date form-control']) ?>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'DateOfBirth')->textInput(['maxlength' => true,'class'=>'date form-control']) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'Age')->textInput(['readOnly'=>true]) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'DateOfJoining')->textInput(['maxlength' => true,'class'=>'date form-control']) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'ConfirmationDate')->textInput(['maxlength' => true,'class'=>'date form-control']) ?>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'Branch')->dropDownList(
        ArrayHelper::map(Branch::find()->all(),'id','value'),
        ['prompt'=>'Select Branch']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'ParentDeparment')->dropDownList(
        ArrayHelper::map(ParentDepartment::find()->all(),'id','value'),
        ['prompt'=>'Select Parent Deparment']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'Department')->dropDownList(
        ArrayHelper::map(Department::find()->all(),'id','value'),
        ['prompt'=>'Select Deparment']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'Designation')->dropDownList(
        ArrayHelper::map(Designation::find()->all(),'id','value'),
        ['prompt'=>'Select Designation']
    ) ?>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'Level')->dropDownList(
        ArrayHelper::map(Level::find()->all(),'id','value'),
        ['prompt'=>'Select Level']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'Grade')->dropDownList(
        ArrayHelper::map(Grade::find()->all(),'id','value'),
        ['prompt'=>'Select Grade']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'EmployeeCategory')->dropDownList(
        ArrayHelper::map(EmployeeCategory::find()->all(),'id','value'),
        ['prompt'=>'Select Employee Category']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'ProTaxLocation')->dropDownList(
        ArrayHelper::map(ProTaxLocation::find()->all(),'id','value'),
        ['prompt'=>'Select Pro Tax Location']
    ) ?>
</div></div>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'Process')->dropDownList(
        ArrayHelper::map(Process::find()->all(),'id','value'),
        ['prompt'=>'Select Process']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'PANCard')->textInput(['maxlength'=>true]) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'AadharNumber')->textInput() ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'PassportNumber')->textInput() ?>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'MobileNo')->textInput() ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'AlternateMobileNo')->textInput() ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'PersonalEmailId')->textInput() ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'OfficialEmailId')->textInput() ?>
</div></div>
<div class="row"> <div class="col-md-3">
    <?= $form->field($model, 'MetroNonMetro')->dropDownList(
        ArrayHelper::map(MetroNonMetro::find()->all(),'id','value'),
        ['prompt'=>'Select Metro/Non Metro']
    ) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'TerminationDate')->textInput(['maxlength'=>true,'class'=>'date form-control']) ?>
</div><div class="col-md-3">
    <?= $form->field($model, 'LastWorkingDate')->textInput(['maxlength'=>true,'class'=>'date form-control']) ?>
</div></div>    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        

    </section>
