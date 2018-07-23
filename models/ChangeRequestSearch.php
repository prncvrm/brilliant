<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChangeRequest;


/**
 * ChangeRequestSearch represents the model behind the search form of `app\models\ChangeRequest`.
 */
class ChangeRequestSearch extends ChangeRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'RaisedById', 'RaisedEmpCode', 'Resolved'], 'integer'],
            [['OldInTime', 'OldOutTime', 'NewInTime', 'NewOutTime'], 'safe'],
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
        $branch_query=Branch::find()->select(['branch.id'])->leftJoin('branchpermission','branch.id = branchpermission.Branch')->where(['=','Users',Yii::$app->User->identity->id]);
        $permission_query=UserType::find()->select(['usertype.id'])->leftJoin('roleassignment','usertype.id = roleassignment.UserType')->where(['=','Users',Yii::$app->User->identity->id]);
        $emp_query = Employee::find()->select(['id'])->where(['in','Branch',$branch_query])->andFilterWhere(['in','Designation',$permission_query]);
        $query = ChangeRequest::find()->where(['in','RaisedEmpCode',$emp_query]);


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
            'RaisedById' => $this->RaisedById,
            'RaisedEmpCode' => $this->RaisedEmpCode,
            'OldInTime' => $this->OldInTime,
            'OldOutTime' => $this->OldOutTime,
            'NewInTime' => $this->NewInTime,
            'NewOutTime' => $this->NewOutTime,
            'Resolved' => $this->Resolved,
        ]);

        return $dataProvider;
    }
}
