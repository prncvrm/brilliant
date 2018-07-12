<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\BloodGroup;
use app\models\Gender;
use app\models\ParentDepartment;
use app\models\Branch;
use app\models\Department;
use app\models\Designation;
use app\models\Grade;
use app\models\Level;
use app\models\MaritalStatus;
use app\models\EmployeeCategory;
use app\models\ProTaxLocation;
use app\models\Process;
use app\models\MetroNonMetro;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeManagementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-management-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Employee Management', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'FirstName',
                'label'=>'Name',
                'enableSorting' => true,
                 'value'=>function($model){
                    return $model->FirstName." ".$model->MiddleName." ".$model->LastName;
                },
            ],
            //'MiddleName',
            //'LastName',
            //'FatherName',
            //'MotherName',
            [
                'attribute'=>'Gender',
                'label'=>'Gender',
                'enableSorting' => true,
                 'value'=>function($model){
                    return Gender::findAll(['id'=>$model->Gender])[0]["value"];
                },
            ],
            //'BloodGroup',
            //'MaritalStatus',
            //'DateOfMarried',
            //'DateOfBirth',
            //'Age',
            'DateOfJoining',
            //'ConfirmationDate',
            [
                'attribute'=>'Branch',
                'label'=>'Branch',
                'enableSorting' => true,
                 'value'=>function($model){
                    return Branch::findAll(['id'=>$model->Branch])[0]["value"];
                },
            ],
            //'ParentDeparment',
            [
                'attribute'=>'Department',
                'label'=>'Department',
                'enableSorting' => true,
                 'value'=>function($model){
                    return Department::findAll(['id'=>$model->Department])[0]["value"];
                },
            ],
            [
                'attribute'=>'Designation',
                'label'=>'Designation',
                'enableSorting' => true,
                 'value'=>function($model){
                    return Designation::findAll(['id'=>$model->Designation])[0]["value"];
                },
            ],
            //'Level',
            //'Grade',
            [
                'attribute'=>'EmployeeCategory',
                'label'=>'EmployeeCategory',
                'enableSorting' => true,
                 'value'=>function($model){
                    return EmployeeCategory::findAll(['id'=>$model->EmployeeCategory])[0]["value"];
                },
            ],
            //'ProTaxLocation',
            //'Process',
            //'PANCard',
            //'AadharNumber',
            //'PassportNumber',
            'MobileNo',
            //'AlternateMobileNo',
            //'PersonalEmailId:email',
            //'OfficialEmailId:email',
            //'MetroNonMetro',
            //'TerminationDate',
            //'LastWorkingDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
