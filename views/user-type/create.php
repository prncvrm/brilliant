<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserType */

$this->title = 'New Role';
$this->params['breadcrumbs'][] = ['label' => 'User Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
