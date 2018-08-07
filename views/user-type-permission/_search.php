<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\UserTypePermissionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-type-permission-search">

    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UserName')->dropDownList(
    ArrayHelper::map(Users::find()->all(),'id','UserName'),
    ['prompt'=>'Select Name','name'=>'user_id']
    ) ?>

    
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
