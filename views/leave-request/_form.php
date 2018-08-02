<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LeaveCategory;

/* @var $this yii\web\View */
/* @var $model app\models\LeaveRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leave-request-form">
    <?php $form = ActiveForm::begin(['id'=>'leave_request']); ?>
    <div class="row">
        <div class="col-md-4">
            <?php if(!$model->Resolved){?>
    <?=$form->field($model,'Date')->textInput(['disabled'=>true]) ?>
    	</div><div class="col-md-4">
  <?= $form->field($model, 'Type')->dropDownList(
        yii\helpers\ArrayHelper::map(LeaveCategory::find()->where(['id'=>$employeeModel->LeaveType])->all(),'id','Name')+yii\helpers\ArrayHelper::map(LeaveCategory::find()->where(['>','id',2])->all(),'id','Name'),
        ['prompt'=>'Select Type']
    ) ?>
</div>
<div class="col-md-4">
  <?= $form->field($model, 'Duration')->dropDownList(
        [1=>'First Half',2=>'Second Half',3=>'Full Day'],
        ['prompt'=>'Select Duration']
    ) ?>
</div>
</div>
    <div class="row">
        <div class="col-md-12">

    <?= $form->field($model, 'Reason')->textarea(['rows' => 4]) ?>
<?php }else {?>
<?=$form->field($model,'Date')->textInput(['disabled'=>true]) ?>
        </div><div class="col-md-4">
             <?= $form->field($model, 'Type')->dropDownList(
         yii\helpers\ArrayHelper::map(LeaveCategory::find()->where(['id'=>$employeeModel->LeaveType])->all(),'id','Name')+yii\helpers\ArrayHelper::map(LeaveCategory::find()->where(['>','id',2])->all(),'id','Name'),
        ['prompt'=>'Select Type','disabled'=>true]
    ) ?>
</div>
<div class="col-md-4">
  <?= $form->field($model, 'Duration')->dropDownList(
        [1=>'First Half',2=>'Second Half',3=>'Full Day'],
        ['prompt'=>'Select Duration','disabled'=>true]
    ) ?>
</div>
</div>
    <div class="row">
        <div class="col-md-12">

    <?= $form->field($model, 'Reason')->textarea(['rows' => 4,'disabled'=>true]) ?>
<?php }?>
</div></div>
    
    <div class="form-group">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?= Html::submitButton('Request', ['class' => 'btn btn-success','id'=>'submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 <?php
$js=<<< JS
  $('#leave_request').attr("onsubmit","return false");
    $('#leave_request').on('beforeSubmit', function(e) {
    e.preventDefault();
    console.log("form submission initiated");
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            alert('Leave Request Submitted');
        },
        error: function () {
            alert("You have used your Paid Leaves");
        }
    })
}).on('submit',function(e){
      e.preventDefault();
      });
JS;

$this->registerJs($js);
?>

</div>
