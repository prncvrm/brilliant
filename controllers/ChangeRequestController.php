<?php

namespace app\controllers;

use Yii;
use app\models\ChangeRequest;
use app\models\ChangeRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AttendanceIn;
use yii\filters\AccessControl;
use app\models\Users;

/**
 * ChangeRequestController implements the CRUD actions for ChangeRequest model.
 */
class ChangeRequestController extends Controller
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
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'update', 'delete','branch-details'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               Users::ROLE_ADMIN,
                           ],
                    ],
                    [
                        'actions' => ['index','create', 'update', 'delete','approve','delete',],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               Users::ROLE_ADMIN,
                               Users::ROLE_MODERATOR,
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
     * Lists all ChangeRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ChangeRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReverseIndex()
    {
        $searchModel = new ChangeRequestSearch();
        $dataProvider = $searchModel->search("[[ChangeRequestSearch] => [[Resolved] => 1 ]]");

        return $this->render('reverse', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single ChangeRequest model.
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
     * Creates a new ChangeRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($EmpCode, $InTime,$OutTime,$Date)
    {
        if (Yii::$app->request->isAjax) {
            $model=$this->_findModel($EmpCode,$Date);
            if($model==null){
                $model=new ChangeRequest;
                $model->RaisedById=Yii::$app->User->identity->id;
                $model->RaisedEmpCode=$EmpCode;
                $model->OldInTime=$InTime;
                $model->OldOutTime=$OutTime;
                $model->Date=$Date;
                $model->Resolved=0;    
            }


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return print_r("['success']");
            }
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        else{
            print_r("Not Ajax Request");
        }
    }

    /**
     * Updates an existing ChangeRequest model.
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
     * Deletes an existing ChangeRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionApprove($id)
    {
        $_model=$this->findModel($id);
        $model=AttendanceIn::findIdentityByUniqueKeys($_model->RaisedEmpCode,$_model->Date);
        $model->Time=$_model->NewInTime;
        $model->OutTime=$_model->NewOutTime;
        $_model->Resolved=1;
        if($model->save()&&$_model->save())
            return $this->redirect(['index']); 
        //print_r($model);
        throw new NotFoundHttpException('Some Issue, Fixing it.');
    }

    public function actionReverse($id)
    {
        $_model=$this->findModel($id);
        $_model->Resolved=0;
        if($_model->save())
            return $this->redirect(['reverse-index']); 
        //print_r($model);
        throw new NotFoundHttpException('Some Issue, Fixing it.');
    }

    public function actionDelete($id)
    {
        $_model=$this->findModel($id);
        $_model->Resolved=1;
        $_model->Reason=$_model->Reason."(Rejected)";
        if($_model->save())    
            return $this->redirect(['index']);
        throw new NotFoundHttpException('Some Issue, Fixing it.');
    }

    /**
     * Finds the ChangeRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChangeRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function _findModel($EmpId, $Date){
        if(($model=ChangeRequest::findOne(['RaisedEmpCode'=>$EmpId,'Date'=>$Date])) !==null){
            return $model;
        }

    }
    protected function findModel($id)
    {
        if (($model = ChangeRequest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
