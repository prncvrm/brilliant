<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%BranchPermission}}".
 *
 * @property int $id
 * @property int $Users
 * @property int $Branch
 */
class BranchPermission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%branchpermission}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Users', 'Branch'], 'required'],
            [['Users', 'Branch'], 'integer'],
            [['Users', 'Branch'], 'unique', 'targetAttribute' => ['Users', 'Branch']],
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
            'Branch' => 'Branch',
            
        ];
    }

 }
