<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%TravelFinal}}".
 *
 * @property int $id
 * @property int $TGIid
 * @property double $AdvanceTaken
 * @property double $Sanctioned
 */
class TravelFinal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%TravelFinal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGIid', 'AdvanceTaken', 'Sanctioned'], 'required'],
            [['TGIid'], 'integer'],
            [['AdvanceTaken', 'Sanctioned'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TGIid' => 'Tgiid',
            'AdvanceTaken' => 'Advance Taken',
            'Sanctioned' => 'Sanctioned',
        ];
    }
}
