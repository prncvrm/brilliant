<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TravelGeneralInformation;

/**
 * TravelGeneralInformationSearch represents the model behind the search form of `app\models\TravelGeneralInformation`.
 */
class TravelGeneralInformationSearch extends TravelGeneralInformation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'EmployeeId', 'Location'], 'integer'],
            [['PurposeOfTour', 'From', 'To'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        
        $query = TravelGeneralInformation::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'EmployeeId' => $this->EmployeeId,
            'Location' => $this->Location,
            
        ]);
        $query->andFilterWhere(['>=','From',$this->From]);
        $query->andFilterWhere(['<=','To',$this->To]);
        $query->andFilterWhere(['like', 'PurposeOfTour', $this->PurposeOfTour]);

        return $dataProvider;
    }
}
