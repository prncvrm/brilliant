<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%OtherExpense}}".
 *
 * @property int $id
 * @property int $TGIid
 * @property string $Date
 * @property string $Particulars
 * @property double $Amount
 */
class OtherExpense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%OtherExpense}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGIid', 'Date', 'Particulars', 'Amount'], 'required'],
            [['TGIid'], 'integer'],
            [['Date'], 'safe'],
            [['Amount'], 'number'],
            [['Particulars'], 'string', 'max' => 255],
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
            'Particulars' => 'Particulars',
            'Amount' => 'Amount',
        ];
    }
}
