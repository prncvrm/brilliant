<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use app\models\Branch;
use yii\grid\GridView;
?>
<style type="text/css">
	td{
		width:0.1%;
white-space: nowrap;
	}
	h3{
		padding: 0px !important;
		margin: 0px !important;
	}
</style>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<div class="col-md-12 col-sm-12 col-xs-12">
	<h2 style="text-align: center">Employee Tour Report</h2>
 <form class="form-horizontal" action="#">
 	<div class="row">
 	<div class="col-md-6 col-xs-6 col-sm-6">
  <div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" >Employee Code:</label>
    <div class="col-md-7 col-sm-7 col-xs-7">
      <input class="form-control" disabled value=<?=Employee::findOne(['id'=>$model->EmployeeId])->EmployeeCode?>>
    </div>
  </div>
	</div>
	<div class="col-md-6 col-xs-6 col-sm-6">
  <div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" for="pwd">Employee Name:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
     	<input class="form-control" disabled value=<?=Employee::findOne(['id'=>$model->EmployeeId])->EmployeeName?>>
    </div>
  </div>
</div>
</div>
<div class="row">
 	<div class="col-md-6 col-xs-6 col-sm-6">
  <div class="form-group">
    <label class="control-label col-sm-5 col-sm-5 col-xs-5 " >Purpose Of Tour:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
      <input class="form-control" disabled value=<?=$model->PurposeOfTour?>>
    </div>
  </div>
	</div>
	<div class="col-md-6 col-xs-6 col-sm-6 ">
  <div class="form-group">
    <label class="control-label col-sm-5 col-sm-5 col-xs-5 " for="pwd">To Location:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
     	<input class="form-control" disabled value=<?=Branch::findOne(['id'=>$model->Location])->value?>>
    </div>
  </div>
</div>
</div>
<div class="row">
 	<div class="col-md-6 col-xs-6 col-sm-6">
  <div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" >Froom Date:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
      <input class="form-control" disabled value=<?=$model->From?>>
    </div>
  </div>
	</div>
	<div class="col-md-6 col-xs-6 col-sm-6">
  <div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" for="pwd">To Date:</label>
    <div class="col-sm-7 col-xs-7">
     	<input class="form-control" disabled value=<?=$model->To?>>
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-md-12 col-xs-12 col-sm-12">
<h3>Fare Expense</h3>
<?= GridView::widget([
        'dataProvider' => $FareExpenseDataProvider,
        'layout' => '{items}{pager}',
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'showFooter' => true,
        'columns' => [
       
            ['attribute'=>'ModeOfTravel',
            'enableSorting'=>false,
            'value'=>function($model){
                return \app\models\TravelMode::findOne(['id'=>$model->ModeOfTravel])->value;
            }
            ],
            
            ['attribute'=>'TicketNo',
        	'enableSorting'=>false,],
            ['attribute'=>'Amount',
            'enableSorting'=>false],
            [
            'footer' => app\models\FareExpense::getTotal($model),
        	],
       
        ],
    ]); ?>
</div>
<div class="col-md-12 col-xs-12 col-sm-12">
<h3>Convenyance Expense</h3>
<?= GridView::widget([
        'dataProvider' => $ConveyanceExpenseDataProvider,
        'layout' => '{items}{pager}',
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'showFooter' => true,
        'columns' => [
            ['attribute'=>'Date','enableSorting'=>false],
            ['attribute'=>'FromPlace','enableSorting'=>false],
            ['attribute'=>'ToPlace','enableSorting'=>false],
            ['attribute'=>'Mode',
            'enableSorting'=>false,
            'value'=>function($model){
                return \app\models\TravelMode::findOne(['id'=>$model->Mode])->value;
            }
            ],
            ['attribute'=>'Amount','enableSorting'=>false],
            [
         	'footer' => app\models\ConveyanceExpense::getTotal($model),
        	],

        ],
    ]); ?>
</div>
<div class="col-md-12 col-xs-12 col-sm-12">
<h3>Hotel Expense</h3>
<?= GridView::widget([
        'dataProvider' => $HotelExpenseDataProvider,
        'layout' => '{items}{pager}',
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'showFooter' => true,
        'columns' => [
        
            ['attribute'=>'FromDate','enableSorting'=>false],
            ['attribute'=>'ToDate','enableSorting'=>false],
            ['attribute'=>'NameOfHotel','enableSorting'=>false],
            ['attribute'=>'StayAmount','enableSorting'=>false],
            ['attribute'=>'FoodAmount','enableSorting'=>false],
            [
         	'footer' =>app\models\HotelExpense::getTotal($model),
        	],

       
        ],
    ]); ?>
</div>
<div class="col-md-12 col-xs-12 col-sm-12">
<h3>Other Expense</h3>
<?= GridView::widget([
        'dataProvider' => $OtherExpenseDataProvider,
        'layout' => '{items}{pager}',
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'showFooter' => true,
        'columns' => [
             ['attribute'=>'Date','enableSorting'=>false],
            ['attribute'=>'Particulars','enableSorting'=>false],
            ['attribute'=>'Amount','enableSorting'=>false],
            [
         	'footer' => app\models\OtherExpense::getTotal($model),
        	],

        ],
    ]); ?>
</div>
<div class="col-md-4 col-xs-4 col-sm-4">
	<div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" >Grand Total:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
      <input class="form-control" disabled value=<?=app\models\HotelExpense::getTotal($model)+app\models\OtherExpense::getTotal($model)+app\models\ConveyanceExpense::getTotal($model)+app\models\FareExpense::getTotal($model)?>>
    </div>
  </div>
</div>
<?php if(!$preview){?>
<div class="col-md-4 col-xs-4 col-sm-4">
  <div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" >Advance Taken:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
      <input class="form-control" disabled value=<?=app\models\TravelFinal::findOne(['TGIid'=>$model->id])->AdvanceTaken?>>
    </div>
  </div>
</div>
<div class="col-md-4 col-xs-4 col-sm-4">
  <div class="form-group">
    <label class="control-label col-sm-5 col-xs-5 col-sm-5" >Sanctioned:</label>
    <div class="col-sm-7 col-xs-7 col-md-7 ">
      <input class="form-control" disabled value=<?=app\models\TravelFinal::findOne(['TGIid'=>$model->id])->Sanctioned?>>
    </div>
  </div>
</div>
<?php }?>
</div>
<?php foreach($DocumentUploads as $du){
	echo("<img src='".$du['Image']."' style='width:100%'>");
} ?>
</form> 
</div>