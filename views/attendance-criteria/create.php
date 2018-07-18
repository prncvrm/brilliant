<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AttendanceCriteria */

$this->title = 'Create Attendance Criteria';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Criterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-criteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
