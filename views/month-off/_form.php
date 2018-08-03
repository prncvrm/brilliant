<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Branch;
use app\models\Months;
use app\models\Years;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\MonthOff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="month-off-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class='col-md-4'>
    		<?= $form->field($model, 'BranchId')->dropDownList(
    		ArrayHelper::map(Branch::find()->all(),'id','value'),
        	['class'=>'mul-branch form-control','multiple'=>'multiple','placeholder'=>'Select Branches']
    		) ?>
    	</div>
    	<div class='col-md-4'>
    		<?= $form->field($model, 'Month')->dropDownList(
    		ArrayHelper::map(Months::find()->all(),'id','MonthName'),
        	['prompt'=>'Select Month']
    		) ?> 
    	</div>
    	<div class='col-md-4'>
    		<?= $form->field($model, 'Year')->dropDownList(
    		ArrayHelper::map(Years::find()->all(),'Year','Year'),
        	['prompt'=>'Select Year']
    		) ?>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
	    	<?= $form->field($model, 'Dates')->textInput(['maxlength' => true]) ?>
    	</div>
    </div>
<?php 
$this->registerJs(<<< EOT_JS_CODE
    $('.mul-branch').select2();
EOT_JS_CODE
);
?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
