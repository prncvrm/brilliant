<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use app\models\Branch;
use yii\grid\GridView;
?>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<div class="col-md-12">
 <form class="form-horizontal" action="#">
 	<div class="row">
 	<div class="col-md-6">
  <div class="form-group">
    <label class="control-label col-sm-5" >Employee Code:</label>
    <div class="col-sm-7">
      <input class="form-control" value=<?=Employee::findOne(['id'=>$model->EmployeeId])->EmployeeCode?>>
    </div>
  </div>
	</div>
	<div class="col-md-5">
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Employee Name:</label>
    <div class="col-sm-7">
     	<input class="form-control" value=<?=Employee::findOne(['id'=>$model->EmployeeId])->EmployeeName?>>
    </div>
  </div>
</div>
</div>
<div class="row">
 	<div class="col-md-6">
  <div class="form-group">
    <label class="control-label col-sm-5" >Purpose Of Tour:</label>
    <div class="col-sm-7">
      <input class="form-control" value=<?=$model->PurposeOfTour?>>
    </div>
  </div>
	</div>
	<div class="col-md-5">
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">To Location:</label>
    <div class="col-sm-7">
     	<input class="form-control" value=<?=Branch::findOne(['id'=>$model->Location])->value?>>
    </div>
  </div>
</div>
</div>
<div class="row">
 	<div class="col-md-6">
  <div class="form-group">
    <label class="control-label col-sm-5" >Froom Date:</label>
    <div class="col-sm-7">
      <input class="form-control" value=<?=$model->From?>>
    </div>
  </div>
	</div>
	<div class="col-md-5">
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">To Date:</label>
    <div class="col-sm-7">
     	<input class="form-control" value=<?=$model->To?>>
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h3>Fare Expense</h3>
<?= GridView::widget([
        'dataProvider' => $FareExpenseDataProvider,
        'columns' => [
       
            ['attribute'=>'ModeOfTravel',
            'value'=>function($model){
                return \app\models\TravelMode::findOne(['id'=>$model->ModeOfTravel])->value;
            }
            ],
            
            'TicketNo',
            'Amount',

       
        ],
    ]); ?>
</div>
<div class="col-md-6">
<h3>Convenyance Expense</h3>
<?= GridView::widget([
        'dataProvider' => $ConveyanceExpenseDataProvider,
        'columns' => [
            'Date',
            'FromPlace',
            'ToPlace',
            ['attribute'=>'Mode',
            'value'=>function($model){
                return \app\models\TravelMode::findOne(['id'=>$model->Mode])->value;
            }
            ],
            'Amount',

        ],
    ]); ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h3>Hotel Expense</h3>
<?= GridView::widget([
        'dataProvider' => $HotelExpenseDataProvider,
        'columns' => [
        
            'FromDate',
            'ToDate',
            'NameOfHotel',
            'StayAmount',
            'FoodAmount',

       
        ],
    ]); ?>
</div>
<div class="col-md-6">
<h3>Other Expense</h3>
<?= GridView::widget([
        'dataProvider' => $OtherExpenseDataProvider,
        'columns' => [
              'Date',
            'Particulars',
            'Amount',

        ],
    ]); ?>
</div>
</div>
</form> 
</div>