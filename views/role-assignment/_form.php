<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoleAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-assignment-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model,'Users')->dropDownList(
    	yii\Helpers\ArrayHelper::map(app\models\Users::find()->all(),'id','UserName'),
    	['prompt'=>'Select Name']
    )?>
    
    <?php ActiveForm::end(); ?>
    <div id="roleDetails">
    </div>
</div>
