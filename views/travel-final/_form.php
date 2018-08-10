<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TravelFinal */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="travel-final-form">
                    
    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-6">
						    <?= $form->field($model, 'AdvanceTaken')->textInput() ?>
						   </div>
						   <div class="col-md-6">
    <?= $form->field($model, 'Sanctioned')->textInput() ?>
</div>
</div>
</div>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Generate', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
