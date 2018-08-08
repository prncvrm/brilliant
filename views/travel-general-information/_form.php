<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="travel-general-information-form">
                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'From')->textInput(['class'=>'date form-control']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'To')->textInput(['class'=>'date form-control']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'PurposeOfTour')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'CurrLocation')->dropDownList(
                            yii\helpers\ArrayHelper::map(\app\models\Branch::find()->all(),'id','value'),
                            ['prompt'=>'Select Location']) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'Location')->dropDownList(
                            yii\helpers\ArrayHelper::map(\app\models\Branch::find()->all(),'id','value'),
                            ['prompt'=>'Select Location']) ?>
                        </div>
                    </div>
                    
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                    </div>
               </div>
            </div>
         </div>
</div>
</section>
    <?php ActiveForm::end(); ?>

