<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MonthOff;

/**
 * MonthOffSearch represents the model behind the search form of `app\models\MonthOff`.
 */
class MonthOffSearch extends MonthOff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'BranchId', 'Month', 'Year'], 'integer'],
            [['Dates'], 'safe'],
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
        $query = MonthOff::find();

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
            'BranchId' => $this->BranchId,
            'Month' => $this->Month,
            'Year' => $this->Year,
        ]);

        $query->andFilterWhere(['like', 'Dates', $this->Dates]);

        return $dataProvider;
    }
}
