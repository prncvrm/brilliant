<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TravelGeneralInformation".
 *
 * @property int $id
 * @property int $EmployeeId
 * @property string $PurposeOfTour
 * @property int $Location
 * @property string $From
 * @property string $To
 */
class TravelGeneralInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TravelGeneralInformation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeId', 'PurposeOfTour', 'Location', 'From', 'To','CurrLocation'], 'required'],
            [['EmployeeId', 'Location'], 'integer'],
            [['From', 'To'], 'safe'],
            [['PurposeOfTour'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'EmployeeId' => 'Employee ID',
            'PurposeOfTour' => 'Purpose Of Tour',
            'Location' => 'Visit Location',
            'From' => 'From',
            'To' => 'To',
            'CurrLocation'=>'Current Location',
            'employee.EmployeeCode' =>'Employee Code',
        ];
    }
   
        
}
