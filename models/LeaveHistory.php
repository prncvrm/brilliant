<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%leavehistory}}".
 *
 * @property int $id
 * @property int $EmployeeId
 * @property int $LeaveType
 * @property string $LeaveCount
 * @property string $MaxLeave
 */
class LeaveHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%leavehistory}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeId', 'LeaveType', 'LeaveCount', 'MaxLeave'], 'required'],
            [['EmployeeId', 'LeaveType'], 'integer'],
            [['LeaveCount', 'MaxLeave'], 'number'],
            [['EmployeeId', 'LeaveType'], 'unique', 'targetAttribute' => ['EmployeeId', 'LeaveType']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'EmployeeId' => 'Employee ID',
            'LeaveType' => 'Leave Type',
            'LeaveCount' => 'Leave Count',
            'MaxLeave' => 'Max Leave',
        ];
    }
}
