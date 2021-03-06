<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoleAssignment */

$this->title = 'Update Role Assignment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Role Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-assignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
