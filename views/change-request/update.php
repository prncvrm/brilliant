<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChangeRequest */

$this->title = 'Update Change Request: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Change Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="change-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
