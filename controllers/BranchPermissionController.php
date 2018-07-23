<?php

namespace app\controllers;

use Yii;
use app\models\BranchPermission;
use app\models\BranchPermissionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\BranchSearch;
use app\models\UsersSearch;
use app\models\Users;

/**
 * BranchPermissionController implements the CRUD actions for BranchPermission model.
 */
class BranchPermissionController extends Controller
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
                        'actions' => ['index','create', 'update', 'delete','branch-details'],
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
     * Creates a new BranchPermission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddBranch($id)
    {
        Yii::$app->session->setFlash('success','');
        $model = BranchPermission::findOne(['Users'=>$id]);

        
        return $this->render('addBranch', [
            'model' => $model,
        ]);
    }
    /**
     * Lists all BranchPermission models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new BranchPermissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
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
     * Displays a single BranchPermission model.
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
     * Creates a new BranchPermission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $data=Yii::$app->request->post();
            $model=new BranchPermission();
            $model->Users = $data['Users'];
            $model->Branch=$data['Branch'];
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
     * Updates an existing BranchPermission model.
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
     * Deletes an existing BranchPermission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $data=Yii::$app->request->post();
        BranchPermission::deleteAll(['Users'=>$data['Users'],'Branch'=>$data['Branch']]);
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ['success' =>true];
        return $response;
    }

    /**
     * Finds the BranchPermission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BranchPermission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BranchPermission::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionBranchDetails(){
        if(Yii::$app->request->isAjax){
        $data=Yii::$app->request->post();
        $model = BranchPermission::findOne(['Users'=>$data['id']]);
        $searchModel = new BranchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderPartial('branchDetails', [
            'model' => $model,'dataProvider' => $dataProvider,'UserId'=>$data['id'],
        ]);
        }
    }
}
