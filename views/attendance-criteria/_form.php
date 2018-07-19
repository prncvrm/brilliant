<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AttendanceCriteria */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">Criteria</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="attendance-criteria-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row"><div class="col-md-4">
    <?= $form->field($model, 'MinHoursCount')->textInput() ?>
	</div><div class="col-md-4">
    <?= $form->field($model, 'MaxHoursCount')->textInput() ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'Type')->textarea(['rows' => 1]) ?>
	</div></div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


    
    


                </div>
</div>


              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              
              <!-- /.tab-pane -->
            </div>
</section>

