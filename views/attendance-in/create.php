<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AttendanceIn */

$this->title = 'Create Attendance In';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-in-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
