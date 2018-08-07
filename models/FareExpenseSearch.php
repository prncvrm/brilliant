<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FareExpense;

/**
 * FareExpenseSearch represents the model behind the search form of `app\models\FareExpense`.
 */
class FareExpenseSearch extends FareExpense
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'TGIid', 'ModeOfTravel'], 'integer'],
            [['TicketNo'], 'safe'],
            [['Amount'], 'number'],
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
        $query = FareExpense::find();

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
            'ModeOfTravel' => $this->ModeOfTravel,
            'Amount' => $this->Amount,
        ]);

        $query->andFilterWhere(['like', 'TicketNo', $this->TicketNo]);

        return $dataProvider;
    }
}
