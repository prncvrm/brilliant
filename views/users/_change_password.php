<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;
use app\models\UserType;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="content">
<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generalInformation" data-toggle="tab">User</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="users-form">
                	<?php $form = ActiveForm::begin(); ?>
    				<div class="row"><div class="col-md-6">
                        <div class="alert alert-danger" role="alert">It Is Advised to change your default password!</div>
    					<?= $form->field($model, 'UserPassword')->passwordInput() ?>    				</div>
    			</div>
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