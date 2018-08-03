<?php

/* @var $this yii\web\View */

$this->title = '';
?>
<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <?php if(Yii::$app->user->identity->AccessLevel <= app\models\Users::ROLE_ADMIN){?>
      <div class="row">
        
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Employee</span>
              <span class="info-box-number"><?=app\models\Employee::find()->count();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Active Employee</span>
              <span class="info-box-number"><?=app\models\Employee::find()->where(['Active'=>1])->count();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">InActive Employee</span>
              <span class="info-box-number"><?=app\models\Employee::find()->where(['Active'=>0])->count();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-calendar-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Marked Today</span>
              <span class="info-box-number"><?=app\models\AttendanceIn::find()->where(['Date'=>date('Y-m-d')])->count();?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
    <?php }?>
      <!-- /.row -->

      
      <!-- /.row -->
      <div class="row">
      <?php
      $colors=['yellow','green','red','aqua'];
      $i=0;
      $branch_query=app\models\BranchPermission::findAll(['Users'=>Yii::$app->user->identity->id]);
      foreach ($branch_query as $bq){
        ?>
        
        <div class="col-md-3">
          <div class="info-box bg-<?=$colors[$i++]?>">
            <span class="info-box-icon"><i class="ion ion-ios-home-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?=app\models\Branch::findOne(['id'=>$bq['Branch']])->value?></span>
            <?php
            $total_emp=app\models\Employee::find()->where(['Branch'=>$bq['Branch'],'Active'=>1])->count();
            $emp_present=app\models\AttendanceIn::find()->select(['attendancein.EmployeeId'])->leftJoin('employee','attendancein.EmployeeId = employee.id')->where(['=','employee.branch',$bq["Branch"]])->andWhere(['=','attendancein.Date',date("Y-m-d")])->count();
            ?>
            <span class="info-box-number"><?=$total_emp;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: <?=($emp_present*100)/$total_emp?>%"></div>
              </div>
              <span class="progress-description">
                    <?=$emp_present;?>
                  </span>
            </div>
          </div>
        </div>
        <?php
        if($i==4)
          $i=0;
        }
      ?>
      <!-- Main row -->
      
              
        
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
