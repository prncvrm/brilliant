<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%months}}".
 *
 * @property int $id
 * @property string $MonthName
 * @property int $Days
 */
class Months extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%months}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MonthName', 'Days'], 'required'],
            [['Days'], 'integer'],
            [['MonthName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'MonthName' => 'Month Name',
            'Days' => 'Days',
        ];
    }
}
