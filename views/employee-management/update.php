<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeManagement */

$this->title = 'Update Employee: ' . $model->FirstName;
$this->params['breadcrumbs'][] = ['label' => 'Employee Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-management-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
