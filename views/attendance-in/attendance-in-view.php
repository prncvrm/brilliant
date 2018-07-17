<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendance In View';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    table td, table th{
        text-align: center;
    }
</style>
<div class="employee-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php function add_zero($num){
        return sprintf("%02d",$num);
    }
    $total_minutes=0;

    function time_diff($timeOut,$timeIn){
        global $total_minutes;
        $timeIn=preg_split("/[:,]+/", $timeIn);
        $timeOut=preg_split("/[:,]+/", $timeOut);
        $total_minutes=$total_minutes+(60*($timeOut[0]-$timeIn[0]))+abs($timeOut[1]-$timeIn[1]);
        return (String)($timeOut[0]-$timeIn[0]).":".(String)abs($timeOut[1]-$timeIn[1]).":".(String)abs($timeOut[2]-$timeIn[2]);
    }
    ?>
    <div class="row">
        <div class="col-md-8">
    <table class="table table-striped">
  <tr>
    <th>Date</th>
    <th>Present/Absent</th> 
    <th>In Time</th>
    <th>Out Time</th>
    <th>Working Hours</th>
    <th>Change/Request</th>
  </tr>
  <?php for($i=1;$i<=$no_days;++$i){?>
  <tr>
    <td><?=add_zero($i)."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-".Yii::$app->request->queryParams['AttendanceInSearch']["Year"]?></td>
    <td style="color:green;font-size: 17px;"><?php
    $date=Yii::$app->request->queryParams['AttendanceInSearch']["Year"]."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-".add_zero($i);
    if(array_key_exists($date,$present_days))
        echo "&#10004;";
    ?></td>
    <td style="color:green;font-size: 18px">
    <?php
   if(isset($present_days[$date]))
        echo $present_days[$date]["InTime"];
    ?>
    </td>
    <td style="color:red;font-size: 18px">
          <?php
   if(isset($present_days[$date]))
        echo $present_days[$date]["OutTime"];
    ?>  

    </td>
    <td style="color:green;font-size: 18px">
         <?php
   if(isset($present_days[$date]))
    if(isset($present_days[$date]["OutTime"]))
       echo (time_diff($present_days[$date]["OutTime"],$present_days[$date]["InTime"]));
    ?>
    </td>
    <td><?php if(isset($present_days[$date]) && isset($present_days[$date]['OutTime'])){ ?>
        <button class="request" href="<?=Yii::$app->homeUrl?>change-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["Month"]?>&InTime=<?=$present_days[$date]['InTime']?>&OutTime=<?=$present_days[$date]['OutTime']?>&Date=<?=$date?>" data-toggle="modal" data-target="#myModal">Request</button>
      <?php }?>
    </td>
  </tr>
<?php }?>
</table>
</div>
<div class="col-md-4" style="font-size:18px;">
    <p><b>Number of Working Hours :</b> <?php global $total_minutes;
echo($total_minutes/60);
        ?> Hours</p>
    <p><b>Number of Present Days :</b> <?php echo count($present_days);
        ?></p>
</div>
</div>

<div class="modal modal-info fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Make Change Request</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Request Change</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $("document").on('ready pjax:success',function(){
        $(".request").click(function(e){
            e.preventDefault();
            $('$modal').modal('show').find('.modal-content').load($(this).attr('href'));
        }); 
    });
    $('#w0').on('beforeSubmit', function(e) {
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            alert('Test');
        },
        error: function () {
            alert("Something went wrong");
        }
    });
}).on('submit', function(e){
    e.preventDefault();
});
</script>


</div>