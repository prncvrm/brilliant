<?php
use app\models\Designation;
?>
<div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive " src= <?=$model->ProfileImage!=''? '../'.$model->ProfileImage:'../img/nobody_m_1024x1024.jpg'?> alt="User profile picture">

              <h3 class="profile-username text-center"><?=$model->FirstName." ".$model->MiddleName." ".$model->LastName?></h3>

              <p class="text-muted text-center"><?=$model->Designation!=""?Designation::findAll(['id'=>$model->Designation])[0]["value"]:""?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Birthday</b> <a class="pull-right"><?=$model->DateOfBirth?></a>
                </li>
                <li class="list-group-item">
                  <b>Anniversary</b> <a class="pull-right"><?=$model->DateOfMarried?></a>
                </li>
                <li class="list-group-item">
                  <b>Shift Details</b> <a class="pull-right"></a>
                </li>
              </ul>
              <?=$form->field($model, 'ProfileImage_file')->fileInput(['class'=>'btn btn-primary btn-block'])?>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>