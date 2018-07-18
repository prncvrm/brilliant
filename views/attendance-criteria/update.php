<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AttendanceCriteria */

$this->title = 'Update Attendance Criteria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attendance Criterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-criteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
