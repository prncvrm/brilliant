<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%leaverequest}}".
 *
 * @property int $id
 * @property int $RaisedById
 * @property int $RaisedEmpId
 * @property string $Reason
 * @property int $Resolved
 */
class LeaveRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%leaverequest}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RaisedById', 'RaisedEmpId', 'Reason', 'Resolved','Type'], 'required'],
            [['RaisedById', 'RaisedEmpId', 'Resolved','Type'], 'integer'],
            [['Reason'], 'string'],
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
            'RaisedEmpId' => 'Raised Emp ID',
            'Reason' => 'Reason',
            'Resolved' => 'Resolved',
        ];
    }
}
