<?php

namespace app\controllers;

use Yii;
use app\models\UserTypePermission;
use app\models\UserTypePermissionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\UserTypeSearch;
use app\models\UsersSearch;
use app\models\Users;
use app\models\Employee;
use app\models\RoleAssignment;
use app\models\BranchPermission;
use app\models\Branch;
use app\models\UserType;
use yii\data\ArrayDataProvider;
/**
 * UserTypePermissionController implements the CRUD actions for UserTypePermission model.
 */
class UserTypePermissionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig'=>[
                    'class'=>\app\components\AccessRule::className(),
                ],
                'only' => ['index','create', 'update', 'delete','branch-details'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'update', 'delete','user-type-details'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               Users::ROLE_ADMIN,
                           ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserTypePermission models.
     * @return mixed
     */
    public function actionAddUserType($id)
    {
        Yii::$app->session->setFlash('success','');
        $model = UserTypePermission::findOne(['Users'=>$id]);

        
        return $this->render('addUserType', [
            'model' => $model,
        ]);
    }
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $_model = new Users();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            '_model'=>$_model,
        ]);
    }

    /**
     * Displays a single UserTypePermission model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAddAllApplicable($user_id){
        $query=BranchPermission::find()->select(['branchpermission.Branch','roleassignment.UserType'])->leftJoin('roleassignment','roleassignment.users=branchpermission.Users')->where(['=','branchpermission.Users',$user_id])->asArray()->all();
         foreach($query as $q){
            $model = new UserTypePermission();
            $model->Users=$user_id;
            $model->UserType=$q['UserType'];
            $model->Branch=$q['Branch'];
            if($model->validate()){
                $model->save();
                           }
            
        }
        return $this->redirect(['view','user_id'=>$user_id]);
    }
    
    public function actionView($user_id)
    {
        $query=BranchPermission::find()->select(['branchpermission.Branch','roleassignment.UserType'])->leftJoin('roleassignment','roleassignment.users=branchpermission.Users')->where(['=','branchpermission.Users',$user_id])->asArray()->all();
        $provider = new ArrayDataProvider([
            'allModels'=>$query,
            'pagination' => [ 'pageSize' => 20 ],
         ]);
         $models = $provider->getModels();

        $searchModel = new UserTypePermissionSearch();
        $dataProviderAllowed = $searchModel->search(Yii::$app->request->queryParams);
        $dataProviderAllowed->query->andWhere(['Users'=>$user_id]);


        return $this->render('view',['dataProvider'=>$provider,'dataProviderAllowed'=>$dataProviderAllowed]);
        
    }

    /**
     * Creates a new UserTypePermission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        if(Yii::$app->request->isAjax){
            $data=Yii::$app->request->post();
            $model=new UserTypePermission();
            $model->Users = $data['Users'];
            $model->UserType=$data['UserType'];
            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            if($model->save()){
                $response->data = ['success' =>true];
                return $response;
            }
            else{
                $response->data=['success'=>false];
            }
        }

    }

    /**
     * Updates an existing UserTypePermission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserTypePermission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $user_id=$this->findModel($id)->Users;
        $this->findModel($id)->delete();
        return $this->redirect(['view','user_id'=>$user_id]);
    }

    /**
     * Finds the UserTypePermission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserTypePermission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserTypePermission::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
     public function actionUserTypeDetails(){
        if(Yii::$app->request->isAjax){
        $data=Yii::$app->request->post();
        $model = UserTypePermission::findOne(['Users'=>$data['id']]);
        $searchModel = new UserTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderPartial('usertypeDetails', [
            'model' => $model,'dataProvider' => $dataProvider,'UserId'=>$data['id'],
        ]);
        }
    }
}
