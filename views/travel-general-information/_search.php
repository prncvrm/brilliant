<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;
use app\models\Branch;

/* @var $this yii\web\View */
/* @var $model app\models\TravelGeneralInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="travel-general-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-3">
              <?php
$branch_query=Branch::find()->select(['branch.id'])->leftJoin('branchpermission','branch.id = branchpermission.Branch')->where(['=','Users',Yii::$app->User->identity->id]);
        $query = Employee::find()->where(['in','Branch',$branch_query])->all();
          ?>
 <?= $form->field($model, 'EmployeeId')->label("Employee Name")->dropDownList(
        
        ArrayHelper::map($query,'id','EmployeeName',function($model){return Branch::findOne(['id'=>$model->Branch])->value;}),
        ['prompt'=>'Select Employee Name']
    )?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'Location')->dropDownList(
        ArrayHelper::map(Branch::find()->all(),'id','value'),
        ['prompt'=>"Select Branch"]
    )?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'From')->textInput(['class' => 'date form-control']) ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'To')->textInput(['class' => 'date form-control']) ?>
    </div>
</div>
    
    
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
