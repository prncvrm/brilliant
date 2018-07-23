<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\HolidayType;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\HolidayMaster */
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
                
<div class="holiday-master-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row"><div class="col-md-4">
    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
	</div><div class="col-md-4">
    <?= $form->field($model, 'Date')->textInput(['maxlength' => true,'class'=>'date form-control']) ?>
</div><div class="col-md-4">
    <?= $form->field($model, 'Type')->dropDownList(
    	ArrayHelper::map(HolidayType::find()->all(),'id','value'),
    	['prompt'=>'Select Type']
    ) ?>
</div></div><div class="row"><div class="col-md-4">
    <?= $form->field($model, 'Reason')->textInput(['maxlength' => true]) ?>
</div></div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



    
    


                </div>
</div>


              </div>
           
            </div>
</section>



