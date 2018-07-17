<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%changerequest}}".
 *
 * @property int $id
 * @property int $RaisedById
 * @property int $RaisedEmpCode
 * @property string $OldInTime
 * @property string $OldOutTime
 * @property string $NewInTime
 * @property string $NewOutTime
 * @property int $Resolved
 */
class ChangeRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%changerequest}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RaisedById', 'RaisedEmpCode', 'OldInTime', 'OldOutTime', 'Date','NewInTime', 'NewOutTime'], 'required'],
            [['RaisedById', 'RaisedEmpCode', 'Resolved'], 'integer'],
            [['OldInTime', 'OldOutTime', 'NewInTime', 'NewOutTime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'RaisedById' => 'Raised By ID',
            'RaisedEmpCode' => 'Raised Emp Code',
            'OldInTime' => 'Old In Time',
            'OldOutTime' => 'Old Out Time',
            'NewInTime' => 'New In Time',
            'NewOutTime' => 'New Out Time',
            'Resolved' => 'Resolved',
        ];
    }
}
