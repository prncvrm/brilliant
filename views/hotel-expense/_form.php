<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HotelExpense */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-10">
          <div class="nav-tabs-custom">
            <?=$this->render('../site/_tabs',['active'=>3,'TGI_id'=>$TGI_id])?>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
<div class="hotel-expense-form">

    <?php $form = ActiveForm::begin(); ?>
    
<div class="row">
<div class="col-md-4">
     <?= $form->field($model, 'FromDate')->textInput(['class'=>'form-control date']) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'ToDate')->textInput(['class'=>'form-control date']) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'NameOfHotel')->textInput(['maxlength' => true]) ?>
</div></div><div class="row"><div class="col-md-6">
    <?= $form->field($model, 'StayAmount')->textInput() ?>
</div><div class="col-md-6">
    <?= $form->field($model, 'FoodAmount')->textInput() ?>
</div></div>
    <div class="form-group">
        <?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
