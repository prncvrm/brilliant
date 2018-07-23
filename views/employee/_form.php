<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Branch;
/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">New User</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>
 <div class="row"><div class="col-md-3">
<?php 
if(Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN){
?>
    <?= $form->field($model, 'EmployeeCode')->textInput(['maxlength' => true]) ?>
  </div>
<div class="col-md-3">
    <?= $form->field($model, 'Branch')->dropDownList(
        yii\helpers\ArrayHelper::map(Branch::find()->leftJoin('branchpermission','branch.id = branchpermission.Branch')->where(['=','Users',Yii::$app->User->identity->id])->all(),'id','value'),
        ['prompt'=>'Select Branch Name']
    )  ?>
</div>
  <div class="col-md-6">
    <?= $form->field($model, 'EmployeeName')->textInput(['maxlength' => true]) ?>
</div></div>
<?php }
else{

?>
    <?= $form->field($model, 'EmployeeCode')->textInput(['maxlength' => true,'disabled'=>true]) ?>
  </div>
<div class="col-md-3">
    <?= $form->field($model, 'Branch')->dropDownList(
        yii\helpers\ArrayHelper::map(Branch::find()->leftJoin('branchpermission','branch.id = branchpermission.Branch')->where(['=','Users',Yii::$app->User->identity->id])->all(),'id','value'),
        ['prompt'=>'Select Branch Name','disabled'=>true]
    )  ?>
</div>
  <div class="col-md-6">
    <?= $form->field($model, 'EmployeeName')->textInput(['maxlength' => true,'disabled'=>true]) ?>
</div></div>
<?php
}
?>
<div class="row"><div class="col-md-4">
    <?= $form->field($model, 'Designation')->dropDownList(
      yii\helpers\ArrayHelper::map(app\models\UserType::find()->all(),'id','value'),
        ['prompt'=>'Select Designation']
      ) ?>
</div><div class="col-md-4">
    <?= $form->field($model, 'DeviceName')->textInput(['maxlength' => true]) ?>
</div><div class="col-md-4">
    <?= $form->field($model, 'MacAddress')->textInput(['maxlength' => true]) ?>
</div></div>

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
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


