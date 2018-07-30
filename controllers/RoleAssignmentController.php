<?php

namespace app\controllers;

use Yii;
use app\models\RoleAssignment;
use app\models\RoleAssignmentSearch;
use app\models\UserTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Users;
use app\models\UsersSearch;

/**
 * RoleAssignmentController implements the CRUD actions for RoleAssignment model.
 */
class RoleAssignmentController extends Controller
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
                'only' => ['index','create', 'update', 'delete','role-details'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'update', 'delete','role-details'],
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
     * Lists all RoleAssignment models.
     * @return mixed
     */
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
     * Displays a single RoleAssignment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RoleAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddRole($id)
    {
        Yii::$app->session->setFlash('success','');
        $model = RoleAssignment::findOne(['Users'=>$id]);

        
        return $this->render('addRole', [
            'model' => $model,
        ]);
    }

    /**
    * @return render
    **/
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $data=Yii::$app->request->post();
            $model=new RoleAssignment();
            $model->Users = $data['User'];
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
     * Updates an existing RoleAssignment model.
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
     * Deletes an existing RoleAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $data=Yii::$app->request->post();
        RoleAssignment::deleteAll(['Users'=>$data['User'],'UserType'=>$data['UserType']]);
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ['success' =>true];
        return $response;
    }

    /**
     * Finds the RoleAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoleAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoleAssignment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRoleDetails(){
        if(Yii::$app->request->isAjax){
        $data=Yii::$app->request->post();
        $model = RoleAssignment::findOne(['Users'=>$data['id']]);
        $searchModel = new UserTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderPartial('roleDetails', [
            'model' => $model,'dataProvider' => $dataProvider, 'UserId'=>$data['id'],
        ]);
        }
    }
}
