<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MonthOff */

$this->title = 'Create Month Off';
$this->params['breadcrumbs'][] = ['label' => 'Month Offs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="month-off-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
