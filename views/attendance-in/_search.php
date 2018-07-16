<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use app\models\Branch;
use app\models\BranchPermission;
use app\models\Months;
use app\models\Years;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\AttendanceInSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">Employee Attendance Sheet</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
<div class="attendance-in-search">

    <?php $form = ActiveForm::begin([
        'action' => ['attendance-in-view'],
        'method' => 'get',
    ]); ?>
<div class="row"><div class="col-md-6">
  <?php
$branch_query=Branch::find()->select(['branch.id'])->leftJoin('branchpermission','branch.id = branchpermission.Branch')->where(['=','Users',Yii::$app->User->identity->id]);
        $query = Employee::find()->where(['in','Branch',$branch_query])->all();
          ?>
    <?= $form->field($model, 'EmployeeId')->dropDownList(
        
        ArrayHelper::map($query,'id','EmployeeName'),
        ['prompt'=>'Select Employee Name']
    ) ?>
     </div>    
     <div class="col-md-3">
    <?= $form->field($model, 'Month')->dropDownList(
        ArrayHelper::map(Months::find()->all(),'id','MonthName'),
        ['prompt'=>'Select Month']
    ) ?>
</div>
<div class="col-md-3">
    <?= $form->field($model, 'Year')->dropDownList(
        ArrayHelper::map(Years::find()->all(),'Year','Year'),
        ['prompt'=>'Select Month']
    ) ?>
</div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
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

