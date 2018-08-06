<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['EmployeeCode', 'EmployeeName', 'DeviceName', 'MacAddress'], 'safe'],
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
        $search_query=UserTypePermission::find()->select('Branch','UserType')->where(['=','Users',Yii::$app->User->identity->id]);
        $query = Employee::find()->leftJoin('usertypepermission','employee.Branch=usertypepermission.Branch and employee.Designation=usertypepermission.UserType')->where(['=','usertypepermission.Users',Yii::$app->user->identity->id]);
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
        ]);

        $query->andFilterWhere(['like', 'EmployeeCode', $this->EmployeeCode])
            ->andFilterWhere(['like', 'EmployeeName', $this->EmployeeName])
            ->andFilterWhere(['like', 'DeviceName', $this->DeviceName])
            ->andFilterWhere(['like', 'MacAddress', $this->MacAddress]);

        return $dataProvider;
    }
}
