<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TravelFinal;

/**
 * TravelFinalSearch represents the model behind the search form of `app\models\TravelFinal`.
 */
class TravelFinalSearch extends TravelFinal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'TGIid'], 'integer'],
            [['AdvanceTaken', 'Sanctioned'], 'number'],
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
        $query = TravelFinal::find();

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
            'TGIid' => $this->TGIid,
            'AdvanceTaken' => $this->AdvanceTaken,
            'Sanctioned' => $this->Sanctioned,
        ]);

        return $dataProvider;
    }
}
