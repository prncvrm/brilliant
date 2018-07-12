<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BranchPermission */

$this->title = 'Create Branch Permission';
$this->params['breadcrumbs'][] = ['label' => 'Branch Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-permission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
