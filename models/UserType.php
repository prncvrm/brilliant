<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%UserType}}".
 *
 * @property int $id
 * @property string $value
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%usertype}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value','description'], 'required'],
            [['value','description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Role',
            'description'=>'Role Description',
        ];
    }
}
