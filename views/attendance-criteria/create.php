<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AttendanceCriteria */

$this->title = 'Attendance Criteria';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Criterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-criteria-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
