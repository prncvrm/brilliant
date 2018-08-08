<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%DocumentUploads}}".
 *
 * @property int $id
 * @property int $TGIid
 * @property string $Image
 */
class DocumentUploads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%DocumentUploads}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TGIid', 'Image'], 'required'],
            [['TGIid'], 'integer'],
            [['Image'], 'string', 'max' => 255],
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
            'Image' => 'Image',
        ];
    }
}
