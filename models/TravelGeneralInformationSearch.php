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
        $search_query=UserTypePermission::find()->select('Branch','UserType')->where(['=','Users',Yii::$app->User->identity->id]);
        $emp_query = Employee::find()->select(['employee.id'])->leftJoin('usertypepermission','employee.Branch=usertypepermission.Branch and employee.Designation=usertypepermission.UserType')->where(['=','usertypepermission.Users',Yii::$app->user->identity->id]);
        //print_r($emp_query->all());
        $query = TravelGeneralInformation::find()->where(['in','EmployeeId',$emp_query]);

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
            'From' => $this->From,
            'To' => $this->To,
        ]);

        $query->andFilterWhere(['like', 'PurposeOfTour', $this->PurposeOfTour]);

        return $dataProvider;
    }
}
