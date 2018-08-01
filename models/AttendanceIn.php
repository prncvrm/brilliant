<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%attendancein}}".
 *
 * @property int $id
 * @property int $EmployeeId
 * @property string $Date
 * @property string $Time
 */
class AttendanceIn extends \yii\db\ActiveRecord
{
    public $Month;
    public $Year;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attendancein}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeId', 'Date'], 'required'],
            [['EmployeeId'], 'integer'],
            [['Date', 'Time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'EmployeeId' => 'Employee Name',
            'Date' => 'Date',
            'Time' => 'Time',
        ];
    }
    public static function findIdentityByUniqueKeys($id,$date)
    {
          return static::findOne(['EmployeeId' => $id,'Date'=>$date]);
    }
}
