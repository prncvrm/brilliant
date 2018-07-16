<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChangeRequest */

$this->title = 'Create Change Request';
$this->params['breadcrumbs'][] = ['label' => 'Change Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
