<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RoleAssignment */

$this->title = 'Add Assigner Entry';
$this->params['breadcrumbs'][] = ['label' => 'Role Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-assignment-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
