<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Branch}}".
 *
 * @property int $id
 * @property string $value
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Branch}}';
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
    public function getBranches(){
        return $this->hasMany(Branches::className(),['id'=>'Branch']);
    }
}
