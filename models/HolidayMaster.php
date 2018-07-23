<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%HolidayMaster}}".
 *
 * @property int $id
 * @property string $Name
 * @property string $Date
 * @property int $Type
 * @property string $Reason
 */
class HolidayMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%holidaymaster}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Date', 'Type', 'Reason'], 'required'],
            [['Type'], 'integer'],
            [['Name', 'Date', 'Reason'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'Date' => 'Date',
            'Type' => 'Type',
            'Reason' => 'Reason',
        ];
    }
}
