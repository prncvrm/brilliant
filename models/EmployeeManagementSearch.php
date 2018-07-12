<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmployeeManagement;

/**
 * EmployeeManagementSearch represents the model behind the search form of `app\models\EmployeeManagement`.
 */
class EmployeeManagementSearch extends EmployeeManagement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Gender', 'BloodGroup', 'MaritalStatus', 'Age', 'Branch', 'ParentDeparment', 'Department', 'Designation', 'Level', 'Grade', 'EmployeeCategory', 'ProTaxLocation', 'Process', 'MetroNonMetro'], 'integer'],
            [['EmployeeCode', 'BusinessCode', 'EmployeeStatus', 'FirstName', 'MiddleName', 'LastName', 'FatherName', 'MotherName', 'DateOfMarried', 'DateOfBirth', 'DateOfJoining', 'ConfirmationDate', 'PANCard', 'AadharNumber', 'PassportNumber', 'MobileNo', 'AlternateMobileNo', 'PersonalEmailId', 'OfficialEmailId', 'TerminationDate', 'LastWorkingDate'], 'safe'],
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
        $query = EmployeeManagement::find();

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
            'Gender' => $this->Gender,
            'BloodGroup' => $this->BloodGroup,
            'MaritalStatus' => $this->MaritalStatus,
            'Age' => $this->Age,
            'Branch' => $this->Branch,
            'ParentDeparment' => $this->ParentDeparment,
            'Department' => $this->Department,
            'Designation' => $this->Designation,
            'Level' => $this->Level,
            'Grade' => $this->Grade,
            'EmployeeCategory' => $this->EmployeeCategory,
            'ProTaxLocation' => $this->ProTaxLocation,
            'Process' => $this->Process,
            'MetroNonMetro' => $this->MetroNonMetro,
        ]);

        $query->andFilterWhere(['like', 'EmployeeCode', $this->EmployeeCode])
            ->andFilterWhere(['like', 'BusinessCode', $this->BusinessCode])
            ->andFilterWhere(['like', 'EmployeeStatus', $this->EmployeeStatus])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'MiddleName', $this->MiddleName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'FatherName', $this->FatherName])
            ->andFilterWhere(['like', 'MotherName', $this->MotherName])
            ->andFilterWhere(['like', 'DateOfMarried', $this->DateOfMarried])
            ->andFilterWhere(['like', 'DateOfBirth', $this->DateOfBirth])
            ->andFilterWhere(['like', 'DateOfJoining', $this->DateOfJoining])
            ->andFilterWhere(['like', 'ConfirmationDate', $this->ConfirmationDate])
            ->andFilterWhere(['like', 'PANCard', $this->PANCard])
            ->andFilterWhere(['like', 'AadharNumber', $this->AadharNumber])
            ->andFilterWhere(['like', 'PassportNumber', $this->PassportNumber])
            ->andFilterWhere(['like', 'MobileNo', $this->MobileNo])
            ->andFilterWhere(['like', 'AlternateMobileNo', $this->AlternateMobileNo])
            ->andFilterWhere(['like', 'PersonalEmailId', $this->PersonalEmailId])
            ->andFilterWhere(['like', 'OfficialEmailId', $this->OfficialEmailId])
            ->andFilterWhere(['like', 'TerminationDate', $this->TerminationDate])
            ->andFilterWhere(['like', 'LastWorkingDate', $this->LastWorkingDate]);

        return $dataProvider;
    }
}
