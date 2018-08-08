<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OtherExpense */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-10">
          <div class="nav-tabs-custom">
            <?=$this->render('../site/_tabs',['active'=>4,'TGI_id'=>$TGI_id])?>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
				<div class="other-expense-form">
					<div class="row">
    <?php $form = ActiveForm::begin(); ?>
						<div class="col-md-12">

    <?= $form->field($model, 'Particulars')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
	<div class="col-md-6">
    <?= $form->field($model, 'Date')->textInput(['class'=>'form-control date']) ?>
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
