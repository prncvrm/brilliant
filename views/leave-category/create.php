<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LeaveCategory */

$this->title = 'New Leave Category';
$this->params['breadcrumbs'][] = ['label' => 'Leave Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-category-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
