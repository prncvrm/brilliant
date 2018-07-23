<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%EmployeeManagement}}".
 *
 * @property int $id
 * @property string $EmployeeCode
 * @property string $BusinessCode
 * @property string $EmployeeStatus
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $FatherName
 * @property string $MotherName
 * @property int $Gender
 * @property int $BloodGroup
 * @property int $MaritalStatus
 * @property string $DateOfMarried
 * @property string $DateOfBirth
 * @property int $Age
 * @property string $DateOfJoining
 * @property string $ConfirmationDate
 * @property int $Branch
 * @property int $ParentDeparment
 * @property int $Department
 * @property int $Designation
 * @property int $Level
 * @property int $Grade
 * @property int $EmployeeCategory
 * @property int $ProTaxLocation
 * @property int $Process
 * @property string $PANCard
 * @property string $AadharNumber
 * @property string $PassportNumber
 * @property string $MobileNo
 * @property string $AlternateMobileNo
 * @property string $PersonalEmailId
 * @property string $OfficialEmailId
 * @property int $MetroNonMetro
 * @property string $TerminationDate
 * @property string $LastWorkingDate
 */
class EmployeeManagement extends \yii\db\ActiveRecord
{
    public $ProfileImage_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employeemanagement}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'FatherName', 'MotherName', 'Gender', 'BloodGroup', 'MaritalStatus', 'DateOfBirth', 'Age', 'DateOfJoining', 'ConfirmationDate', 'Branch', 'ParentDeparment', 'Department', 'Designation', 'Level', 'Grade', 'EmployeeCategory', 'ProTaxLocation', 'Process', 'AadharNumber', 'MetroNonMetro'], 'required'],
            [['Gender', 'BloodGroup', 'MaritalStatus', 'Age', 'Branch', 'ParentDeparment', 'Department', 'Designation', 'Level', 'Grade', 'EmployeeCategory', 'ProTaxLocation', 'Process', 'MetroNonMetro','AadharNumber','AlternateMobileNo','MobileNo'], 'integer'],
            [['ProfileImage_file'],'file','extensions'=>'jpg,jpeg,png','maxSize' => 1024 * 1024 * 2],
            [['EmployeeCode', 'BusinessCode', 'EmployeeStatus', 'FirstName', 'MiddleName', 'LastName', 'FatherName', 'MotherName', 'DateOfMarried', 'DateOfBirth', 'DateOfJoining', 'ConfirmationDate', 'PANCard', 'AadharNumber', 'PassportNumber', 'MobileNo', 'AlternateMobileNo', 'PersonalEmailId', 'OfficialEmailId', 'TerminationDate', 'LastWorkingDate','ProfileImage'], 'string', 'max' => 255],
            [['EmployeeCode'], 'unique'],
            [['BusinessCode'], 'unique'],
            [['OfficialEmailId','PersonalEmailId'],'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'EmployeeCode' => 'Employee Code',
            'BusinessCode' => 'Business Code',
            'EmployeeStatus' => 'Employee Status',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'FatherName' => 'Father Name',
            'MotherName' => 'Mother Name',
            'Gender' => 'Gender',
            'BloodGroup' => 'Blood Group',
            'MaritalStatus' => 'Marital Status',
            'DateOfMarried' => 'Date Of Married',
            'DateOfBirth' => 'Date Of Birth',
            'Age' => 'Age',
            'DateOfJoining' => 'Date Of Joining',
            'ConfirmationDate' => 'Confirmation Date',
            'Branch' => 'Branch',
            'ParentDeparment' => 'Parent Deparment',
            'Department' => 'Department',
            'Designation' => 'Designation',
            'Level' => 'Level',
            'Grade' => 'Grade',
            'EmployeeCategory' => 'Employee Category',
            'ProTaxLocation' => 'Pro Tax Location',
            'Process' => 'Process',
            'PANCard' => 'Pancard',
            'AadharNumber' => 'Aadhar Number',
            'PassportNumber' => 'Passport Number',
            'MobileNo' => 'Mobile No',
            'AlternateMobileNo' => 'Alternate Mobile No',
            'PersonalEmailId' => 'Personal Email ID',
            'OfficialEmailId' => 'Official Email ID',
            'MetroNonMetro' => 'Metro/Non Metro',
            'TerminationDate' => 'Termination Date',
            'LastWorkingDate' => 'Last Working Date',
            'ProfileImage_file' => 'Profile Image',
        ];
    }
}
