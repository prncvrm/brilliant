<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Employee;
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
    $grace_counts=0;
    function time_diff($timeOut,$timeIn){
        global $total_minutes;
        $timeIn=preg_split("/[:,]+/", $timeIn);
        $timeOut=preg_split("/[:,]+/", $timeOut);
        $total_minutes=$total_minutes+(60*($timeOut[0]-$timeIn[0]))+abs($timeOut[1]-$timeIn[1]);
        return (String)add_zero($timeOut[0]-$timeIn[0]).":".(String)add_zero(abs($timeOut[1]-$timeIn[1])).":".(String)add_zero(abs($timeOut[2]-$timeIn[2]));
    }
   
    function atten_value($attendance_criteria,$emp_time_slot_id,$in_time,$out_time){
      global $grace_counts;
      if($in_time=="00:00:00" || $out_time=="00:00:00"){
        return "Absent";
      }
      if(strcmp($in_time,$attendance_criteria[$emp_time_slot_id]['Grace'])<0)
        return "Present";
      else if(strcmp($in_time,$attendance_criteria[$emp_time_slot_id]['Grace'])>0 && strcmp($in_time,$attendance_criteria[$emp_time_slot_id]['DeadOut'])<0){
          $grace_counts++;
        if($grace_counts<=$attendance_criteria[$emp_time_slot_id]['MaxDeadOutCount'])
          return "Present:(".$grace_counts." Late Count)";
        else
          return "Half Day";
      }
        else
          return "Half Day";
      }
    
    
    ?>
    <div class="row">
        <div class="col-md-9">
    <table class="table table-striped" style="font-size:12px;">
  <tr>
    <th>Date</th>
    <th>Present/Absent</th> 
    <th>In Time</th>
    <th>Out Time</th>
    <?php
    if(Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN){
      echo("<th>Hours</th>");
    }
    ?>
    <th>Attendance</th>
    <th>Change/Request</th>
    <th>Request Leave</th>
  </tr>
  <?php print_r($month_off);?>
  <?php for($i=1;$i<=$no_days;++$i){
    if(in_array($i, $month_off)){
      ?>
      <tr>
<td><?=add_zero($i)."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-".Yii::$app->request->queryParams['AttendanceInSearch']["Year"]?></td>
<td colspan="6" style="font-size: 17px;"><span class="label label-danger">WeekOff/Holiday</span></td></tr>
      <?php
    }else{
    ?>
  <tr>
    <td><?=add_zero($i)."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-".Yii::$app->request->queryParams['AttendanceInSearch']["Year"]?></td>
    <?php
    $date=Yii::$app->request->queryParams['AttendanceInSearch']["Year"]."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-".add_zero($i);
    if(array_key_exists($date,$present_days)){
      if($present_days[$date]["InTime"]=="00:00:00"){
    ?>
  <td style="color:red;font-size: 17px;"><?php
        echo "&#10007;";
      }
      else{
        ?>
        <td style="color:green;font-size: 17px;">
        <?php
        echo "&#10004;";
      }
    }
    else{
      ?>
      <td style="font-size: 17px;">
      <?php
    }
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
    <?php
    if(Yii::$app->user->identity->UserType<=app\models\Users::ROLE_ADMIN){
      ?>
    <td style="color:blue;font-size: 18px">
         <?php
   if(isset($present_days[$date]))
    if(isset($present_days[$date]["OutTime"]))
       echo (time_diff($present_days[$date]["OutTime"],$present_days[$date]["InTime"]));
    ?>
    </td>
    <?php
    }
    ?>
    <td style="color:green;font-size: 16px">
         <?php
   if(isset($present_days[$date]))
    if(isset($present_days[$date]["OutTime"])){
      echo atten_value($attendance_criteria,Employee::findAll(['id'=>Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]])[0]['TimeSlot'] ,$present_days[$date]["InTime"],$present_days[$date]["OutTime"]);
      }

    ?>
    </td>
    <td><?php if(isset($present_days[$date]) && isset($present_days[$date]['OutTime'])){ 
        if(isset($present_days[$date]['Resolved'])){
          if($present_days[$date]['Resolved']==0){
            ?>
            <button class="request btn btn-warning" href="<?=Yii::$app->homeUrl?>change-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&InTime=<?=$present_days[$date]['InTime']?>&OutTime=<?=$present_days[$date]['OutTime']?>&Date=<?=$date?>">Req Sent</button>
            <?php
            }
            else{
            ?>
            <button class="request btn btn-success" href="<?=Yii::$app->homeUrl?>change-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&InTime=<?=$present_days[$date]['InTime']?>&OutTime=<?=$present_days[$date]['OutTime']?>&Date=<?=$date?>">Req Complete</button>
            <?php
          }
          }
          else
          {
          ?>
<button class="request btn btn-primary" href="<?=Yii::$app->homeUrl?>change-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&InTime=<?=$present_days[$date]['InTime']?>&OutTime=<?=$present_days[$date]['OutTime']?>&Date=<?=$date?>">Make Req</button>
          <?php
          }
        }
        else if (isset($present_days[$date])) {
          ?>
          <button class="request btn btn-info" href="<?=Yii::$app->homeUrl?>change-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&InTime=<?=$present_days[$date]['InTime']?>&OutTime=null&Date=<?=$date?>">Make Req</button>
          <?php
        }
        else{
          ?>
          <button class="request btn btn-info" href="<?=Yii::$app->homeUrl?>change-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&InTime=null&OutTime=null&Date=<?=$date?>">Make Req</button>
          <?php
        }
      ?>
    </td>
    <td>
      <?php if(array_key_exists($date,$leave_record)){
          if($leave_record[$date]==0){
        ?>
      
      <button class="request btn btn-warning" href="<?=Yii::$app->homeUrl?>leave-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&Date=<?=$date?>"><small><small>Leave Requested</small></small></button>
      <?php 
      }
      else if($leave_record[$date]==-1){
        ?>
        <button class="request btn btn-danger" href="<?=Yii::$app->homeUrl?>leave-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&Date=<?=$date?>"><small><small>Leave Rejected</small></small></button>
        <?php
      }
      else
      {
        ?>
        <button class="request btn btn-success" href="<?=Yii::$app->homeUrl?>leave-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&Date=<?=$date?>"><small><small>Leave Accepted</small></small></button>
        <?php
      }
      }
      else{
        ?>
        <button class="request btn btn-primary" href="<?=Yii::$app->homeUrl?>leave-request/create?EmpCode=<?=Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]?>&Date=<?=$date?>"><small><small>Request Leave </small></small></button>
        <?php
      } ?>
    </td>
  </tr>
<?php }
}?>
</table>
</div>
<div class="col-md-3" style="font-size:18px;">
    <p><b>Present Days :</b> <?php echo count($present_days);
        ?></p>
</div>
</div>

<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Make Request</h4>
      </div>
      <div class="modal-body">
        Please Wait... Loading...
      </div>
      
    </div>
  </div>
</div>
<?php
$js=<<< JS
$(".request").click(function(e){
    e.preventDefault();
    $('#myModal').modal('show').find('.modal-body').load($(this).attr('href'));
});
JS;

$this->registerJs($js);
?>
</div>