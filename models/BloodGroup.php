<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%BloodGroup}}".
 *
 * @property int $id
 * @property string $group
 */
class BloodGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%BloodGroup}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group'], 'required'],
            [['group'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group' => 'Group',
        ];
    }
}
