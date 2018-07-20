<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserTypePermission */

$this->title = 'Update User Type Permission: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Type Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-type-permission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
