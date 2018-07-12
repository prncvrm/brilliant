<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%RoleAssignment}}".
 *
 * @property int $id
 * @property int $Users
 * @property int $UserType
 */
class RoleAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%RoleAssignment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Users', 'UserType'], 'required'],
            [['Users', 'UserType'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Users' => 'Users',
            'UserType' => 'User Type',
        ];
    }
   
}
