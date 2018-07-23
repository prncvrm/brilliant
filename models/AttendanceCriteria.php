<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%attendancecriteria}}".
 *
 * @property int $id
 * @property string $MinHoursCount
 * @property string $MaxHoursCount
 * @property string $Type
 */
class AttendanceCriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attendancecriteria}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MinHoursCount', 'MaxHoursCount', 'Type'], 'required'],
            [['MinHoursCount', 'MaxHoursCount'], 'safe'],
            [['Type'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'MinHoursCount' => 'Min Hours Count',
            'MaxHoursCount' => 'Max Hours Count',
            'Type' => 'Type',
        ];
    }
}
