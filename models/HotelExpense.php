<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%HotelExpense}}".
 *
 * @property int $id
 * @property int $TGIid
 * @property string $FromDate
 * @property string $ToDate
 * @property string $NameOfHotel
 * @property double $StayAmount
 * @property double $FoodAmount
 */
class HotelExpense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%HotelExpense}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGIid', 'FromDate', 'ToDate', 'NameOfHotel', 'StayAmount', 'FoodAmount'], 'required'],
            [['TGIid'], 'integer'],
            [['FromDate', 'ToDate'], 'safe'],
            [['StayAmount', 'FoodAmount'], 'number'],
            [['NameOfHotel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TGIid' => 'Tgiid',
            'FromDate' => 'From Date',
            'ToDate' => 'To Date',
            'NameOfHotel' => 'Name Of Hotel',
            'StayAmount' => 'Stay Amount',
            'FoodAmount' => 'Food Amount',
        ];
    }
}
