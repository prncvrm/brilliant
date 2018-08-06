<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property int $id
 * @property string $EmployeeCode
 * @property string $EmployeeName
 * @property string $DeviceName
 * @property string $MacAddressW
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeCode', 'EmployeeName', 'Branch','Designation','TimeSlot','LeaveType'], 'required'],
            [['EmployeeCode'], 'string', 'max' => 10],
            [['EmployeeName', 'DeviceName'], 'string', 'max' => 255],
            [['MacAddress'], 'string', 'max' => 17],
            
            ['MacAddress', 'match', 'pattern' => '/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/', 'message' => 'Mac Address can be in dd-dd-dd-dd-dd-dd format.'],
            ['EmployeeCode','match','pattern'=>'/^[A-Z]{1,2}[-]{0,1}\d{4}$/','message'=>'Employee Code Must be in X1234 format or XX-1234'],
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
            'EmployeeName' => 'Employee Name',
            'DeviceName' => 'Device Name',
            'MacAddress' => 'Mac Address',
            'Branch'=>'Branch Name',
            'Designation'=>'Designation',
        ];
    }
    public static function findIdentityByMacAddress($token)
    {
          return static::findOne(['MacAddress' => $token]);
    }
   
}
