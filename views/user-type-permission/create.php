<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserTypePermission */

$this->title = 'Create User Type Permission';
$this->params['breadcrumbs'][] = ['label' => 'User Type Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-permission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
