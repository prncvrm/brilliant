<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%usertypepermission}}".
 *
 * @property int $id
 * @property int $Users
 * @property int $UserType
 */
class UserTypePermission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%usertypepermission}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Users', 'UserType'], 'required'],
            [['Users', 'UserType'], 'integer'],
            [['Users', 'UserType','Branch'], 'unique', 'targetAttribute' => ['Users', 'UserType','Branch']],
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
