<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmployeeManagement */

$this->title = 'Employee - Profile';
?>
<div class="employee-management-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
