<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%years}}".
 *
 * @property int $id
 * @property int $Year
 */
class Years extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%years}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Year'], 'required'],
            [['Year'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Year' => 'Year',
        ];
    }
}
