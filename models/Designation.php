<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Designation}}".
 *
 * @property int $id
 * @property string $value
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Designation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
        ];
    }
}
