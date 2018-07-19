<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
/* @var $this yii\web\View */
/* @var $model app\models\ChangeRequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="change-request-form">

    <?php $form = ActiveForm::begin(['id'=>'change_request']); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'Date')->textInput(['disabled'=>true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        <?php if(!$model->Resolved){?>
    <?= $form->field($model, 'OldInTime')->textInput( ) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'OldOutTime')->textInput( ) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'NewInTime')->textInput(['class'=>'form-control _time']) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'NewOutTime')->textInput(['class'=>'form-control _time']) ?>
        </div>
        </div>
    
<div class="row">
        <div class="col-md-12">
    <?= $form->field($model, 'Reason')->textInput( ) ?>
</div>
    <?php }

    else{
        ?>
   <?= $form->field($model, 'OldInTime')->textInput( ['disabled'=>'true']) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'OldOutTime')->textInput( ['disabled'=>'true']) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'NewInTime')->textInput(['disabled'=>'true','class'=>'form-control _time'] ) ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'NewOutTime')->textInput(['disabled'=>'true','class'=>'form-control _time'] ) ?>
        </div>
</div>
    
<div class="row">
        <div class="col-md-12">
    <?= $form->field($model, 'Reason')->textInput(['disabled'=>'true'] ) ?>
</div>

    <?php
    }
    ?>
    
</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <?= Html::submitButton('Request Change', ['class' => 'btn btn-success','id'=>'submit']) ?>
      </div>

    <?php ActiveForm::end(); ?>
<?php
$js=<<< JS
  $('#change_request').attr("onsubmit","return false");
    $('#change_request').on('beforeSubmit', function(e) {
    e.preventDefault();
    console.log("form submission initiated");
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            alert('Change Request Submitted');
        },
        error: function () {
            alert("Something went wrong");
        }
    })
}).on('submit',function(e){
      e.preventDefault();
      });
$(document).ready(function(){
    $('input._time').timepicker({ timeFormat: 'h:mm:ss p' });
});
JS;

$this->registerJs($js);
?>
</div>
<script type="text/javascript">
    
</script>