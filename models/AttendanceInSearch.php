<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AttendanceIn;

/**
 * AttendanceInSearch represents the model behind the search form of `app\models\AttendanceIn`.
 */
class AttendanceInSearch extends AttendanceIn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'EmployeeId'], 'integer'],
            [['Date', 'Time'], 'safe'],
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
        $query = AttendanceIn::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        print_r($month);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'EmployeeId' => $this->EmployeeId,
            'Date' => $this->Date,
            'Time' => $this->Time,
        ]);

        return $dataProvider;
    }
}
