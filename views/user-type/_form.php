<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserType */
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
                <div class="user-type-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="rpw"><div class="col-md-6">
    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
    </div><div class="col-md-6">
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
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


