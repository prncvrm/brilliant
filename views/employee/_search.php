<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSearch */
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

                <div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <div class="row"><div class="col-md-6">
    <?= $form->field($model, 'EmployeeCode') ?>
  </div><div class="col-md-6">
    <?= $form->field($model, 'MacAddress') ?>
</div></div>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
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

