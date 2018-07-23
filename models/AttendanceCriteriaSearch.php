<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AttendanceCriteria;

/**
 * AttendanceCriteriaSearch represents the model behind the search form of `app\models\AttendanceCriteria`.
 */
class AttendanceCriteriaSearch extends AttendanceCriteria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['MinHoursCount', 'MaxHoursCount', 'Type'], 'safe'],
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
        $query = AttendanceCriteria::find();

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
            'MinHoursCount' => $this->MinHoursCount,
            'MaxHoursCount' => $this->MaxHoursCount,
        ]);

        $query->andFilterWhere(['like', 'Type', $this->Type]);

        return $dataProvider;
    }
}
