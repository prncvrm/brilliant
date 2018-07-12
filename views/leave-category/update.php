<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeaveCategory */

$this->title = 'Update Leave Category: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Leave Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leave-category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
