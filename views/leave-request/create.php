<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LeaveRequest */

$this->title = 'Leave Request';
$this->params['breadcrumbs'][] = ['label' => 'Leave Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-request-create">

    <?= $this->render('_form', [
        'model' => $model,
        'employeeModel'=>$employeeModel,
    ]) ?>

</div>
