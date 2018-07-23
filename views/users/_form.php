<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;
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
        ArrayHelper::map(Employee::find()->all(),'id','EmployeeName'),
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

