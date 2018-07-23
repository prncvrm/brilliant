<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HolidayMaster */

$this->title = 'New Holiday';
$this->params['breadcrumbs'][] = ['label' => 'Holiday Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="holiday-master-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
