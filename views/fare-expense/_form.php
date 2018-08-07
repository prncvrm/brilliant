<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TravelMode;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\FareExpense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-10">
          <div class="nav-tabs-custom">
            <?=$this->render('../site/_tabs',['active'=>1])?>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
				<div class="fare-expense-form">

    <?php $form = ActiveForm::begin(); ?>
    
<div class="row">
<div class="col-md-6">
	 
    <?= $form->field($model, 'ModeOfTravel')->dropDownList(
    	yii\helpers\ArrayHelper::map(\app\models\TravelMode::find()->all(),'id','value'),
           ['prompt'=>'Select Mode']
    ) ?>
</div>
</div>
<div class="row">
	<div class="col-md-6">

    <?= $form->field($model, 'TicketNo')->textInput(['maxlength' => true]) ?>
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
