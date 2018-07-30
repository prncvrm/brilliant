<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%monthoff}}".
 *
 * @property int $id
 * @property int $BranchId
 * @property string $Dates
 * @property int $Month
 * @property int $Year
 */
class MonthOff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%monthoff}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BranchId', 'Dates', 'Month', 'Year'], 'required'],
            [['BranchId', 'Month', 'Year'], 'integer'],
            [['Dates'], 'string', 'max' => 255],
            ['Dates','match','pattern'=>'/([0-9,])+(\d,$)/','message'=>'Format is 1,2,3,. Must end with ,(comma)'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'BranchId' => 'Branch ID',
            'Dates' => 'Dates',
            'Month' => 'Month',
            'Year' => 'Year',
        ];
    }
}
