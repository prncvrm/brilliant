<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TravelFinal */

$this->title = 'Update Advance/Sanction';
$this->params['breadcrumbs'][] = ['label' => 'Travel Finals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-2">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
    <label>Purpose Of Travel : </label><br>
    <?= $GeneralInModel->PurposeOfTour;?><br>
    <label>From Date : </label><br>
    <?= $GeneralInModel->From;?><br>
    <label>To Date : </label><br>
    <?= $GeneralInModel->To;?><br>
    <label>Grand Total : </label><br>
    <?= app\models\FareExpense::getTotal($GeneralInModel)+app\models\ConveyanceExpense::getTotal($GeneralInModel)+app\models\HotelExpense::getTotal($GeneralInModel)+app\models\OtherExpense::getTotal($GeneralInModel);?><br>
    
</div>
</div>
</div>
</div>
<div class="travel-final-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
