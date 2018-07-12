<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttendanceInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendance In Time';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<body class="container">
<div class="attendance-in-index col-md-10 col-offset-2 centered center" style="font-size:30px;">
<p class="alert alert-success">
    Attendance Marked Successfully for : <span class="label label-success"><?=$employeeModel->EmployeeName;?></span>
</p><p>
    Time : <?=$model->Time?> (In Time)
    </br>
    Date : <?=$model->Date?></br>
    Device Name : <?=$employeeModel->DeviceName?>
</p>
</div>

</body>