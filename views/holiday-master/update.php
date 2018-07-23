<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HolidayMaster */

$this->title = 'Update Holiday Master: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Holiday Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="holiday-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
