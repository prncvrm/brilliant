<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%FareExpense}}".
 *
 * @property int $id
 * @property int $TGIid
 * @property int $ModeOfTravel
 * @property string $TicketNo
 * @property double $Amount
 */
class FareExpense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%FareExpense}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGIid', 'ModeOfTravel', 'TicketNo', 'Amount'], 'required'],
            [['TGIid', 'ModeOfTravel'], 'integer'],
            [['Amount'], 'number'],
            [['TicketNo'], 'string', 'max' => 255],
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
            'ModeOfTravel' => 'Mode Of Travel',
            'TicketNo' => 'Ticket No',
            'Amount' => 'Amount',
        ];
    }
    public static function getTotal($provider)
    {
        $query = (new \yii\db\Query())->from('FareExpense');
        $sum = $query->where(['TGIid'=>$provider->id])->sum('Amount');
        return $sum;
    }
}
