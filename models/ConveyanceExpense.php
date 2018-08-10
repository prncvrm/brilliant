<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ConveyanceExpense}}".
 *
 * @property int $id
 * @property int $TGIid
 * @property string $Date
 * @property string $FromPlace
 * @property string $ToPlace
 * @property int $Mode
 * @property double $Amount
 */
class ConveyanceExpense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ConveyanceExpense}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGIid', 'Date', 'FromPlace', 'ToPlace', 'Mode', 'Amount'], 'required'],
            [['TGIid', 'Mode'], 'integer'],
            [['Date'], 'safe'],
            [['Amount'], 'number'],
            [['FromPlace', 'ToPlace'], 'string', 'max' => 255],
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
            'Date' => 'Date',
            'FromPlace' => 'From Place',
            'ToPlace' => 'To Place',
            'Mode' => 'Mode',
            'Amount' => 'Amount',
        ];
    }
    public static function getTotal($provider)
    {
        $query = (new \yii\db\Query())->from('ConveyanceExpense');
        $sum = $query->where(['TGIid'=>$provider->id])->sum('Amount');
        return $sum;
    }
}
