<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeManagement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-management-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'EmployeeCode',
            'BusinessCode',
            'EmployeeStatus',
            'FirstName',
            'MiddleName',
            'LastName',
            'FatherName',
            'MotherName',
            'Gender',
            'BloodGroup',
            'MaritalStatus',
            'DateOfMarried',
            'DateOfBirth',
            'Age',
            'DateOfJoining',
            'ConfirmationDate',
            'Branch',
            'ParentDeparment',
            'Department',
            'Designation',
            'Level',
            'Grade',
            'EmployeeCategory',
            'ProTaxLocation',
            'Process',
            'PANCard',
            'AadharNumber',
            'PassportNumber',
            'MobileNo',
            'AlternateMobileNo',
            'PersonalEmailId:email',
            'OfficialEmailId:email',
            'MetroNonMetro',
            'TerminationDate',
            'LastWorkingDate',
        ],
    ]) ?>

</div>
