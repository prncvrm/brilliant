<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConveyanceExpense */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-10">
          <div class="nav-tabs-custom">
            <?=$this->render('../site/_tabs',['active'=>2,'TGI_id'=>$TGI_id])?>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
<div class="conveyance-expense-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-4">

    <?= $form->field($model, 'Date')->textInput(['class' => 'form-control limit-date']) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'FromPlace')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'ToPlace')->textInput(['maxlength' => true]) ?>
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'Mode')->dropDownList(
        yii\helpers\ArrayHelper::map(\app\models\TravelMode::find()->all(),'id','value'),
           ['prompt'=>'Select Mode']
    ) ?>
</div>
<div class="col-md-6">
    <?= $form->field($model, 'Amount')->textInput() ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js=<<< JS
    $('.limit-date').datepicker({
        format:"yyyy-mm-dd",
        minDate:0,
        })
JS;
        $this->registerJs($js);
?>
