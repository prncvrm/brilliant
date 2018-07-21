<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%timeslots}}".
 *
 * @property int $id
 * @property string $InTime
 * @property string $OutTime
 * @property string $Grace
 * @property string $DeadOut
 */
class TimeSlots extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%timeslots}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['InTime', 'OutTime', 'Grace', 'DeadOut'], 'required'],
            [['InTime', 'OutTime', 'Grace', 'DeadOut'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'InTime' => 'In Time',
            'OutTime' => 'Out Time',
            'Grace' => 'Grace',
            'DeadOut' => 'Dead Out',
        ];
    }
}
