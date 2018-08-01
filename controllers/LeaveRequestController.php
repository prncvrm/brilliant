<?php

namespace app\controllers;

use Yii;
use app\models\LeaveRequest;
use app\models\LeaveRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AttendanceIn;
use yii\filters\AccessControl;
use app\models\Users;
use app\models\Employee;
use app\models\LeaveHistory;


/**
 * LeaveRequestController implements the CRUD actions for LeaveRequest model.
 */
class LeaveRequestController extends Controller
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
                'only' => ['index','create', 'update', 'delete','reverse-index','approve','reverse'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'update', 'delete','approve'],
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
     * Lists all LeaveRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeaveRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LeaveRequest model.
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
     * Creates a new LeaveRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($EmpCode,$Date)
    {
      
        if (Yii::$app->request->isAjax) {
            $model=$this->_findModel($EmpCode,$Date);
            if($model==null){
                $model=new LeaveRequest;
                $model->RaisedById=Yii::$app->User->identity->id;
                $model->RaisedEmpId=$EmpCode;
                $model->Date=$Date;
                $model->Resolved=0;    
            }
            $employeeModel=Employee::findOne($EmpCode);
            $leaveHistory=LeaveHistory::findOne(["EmployeeId"=>$EmpCode]);
            if ($model->load(Yii::$app->request->post())) {
                if($leaveHistory->MaxLeave-$leaveHistory->LeaveCount >=0.5)
                    if($model->Type<=2){
                        $model->save();
                        return print_r("['success']"); 
                    }
                throw new NotFoundHttpException("Can't Make");
            }
            return $this->renderAjax('create', [
                'model' => $model,
                'employeeModel'=>$employeeModel,
            ]);
        }
        else{
            print_r("Not Ajax Request");
        }
    }
    public function actionApprove($id)
    {
        $_model=$this->findModel($id);
        if($_model){
            if(!$model=AttendanceIn::findIdentityByUniqueKeys($_model->RaisedEmpId,$_model->Date))
                $model=new AttendanceIn();
            if(!$leaveHistoryModel=LeaveHistory::findOne(['EmployeeId'=>$_model->RaisedEmpId])){
                $leaveHistoryModel= new LeaveHistory();
                $leaveHistoryModel->EmployeeId=$_model->RaisedEmpId;
                $leaveHistoryModel->LeaveType=$_model->Duration;
                $leaveHistoryModel->MaxLeave=\app\models\LeaveCategory::findOne(['id'=>$_model->Duration])->LeaveCount;
            }
            $model->EmployeeId=$_model->RaisedEmpId;
            $model->Date=$_model->Date;
            $model->Time=NULL;
            $model->OutTime=NULL;
            if($_model->Duration==1)
                $model->FirstHalf=($_model->Type<=2)?($_model->Type==1)?"TL":"CL":"NPL";
            else if($_model->Duration==2)
                $model->SecondHalf=($_model->Type<=2)?($_model->Type==1)?"TL":"CL":"NPL";
            else if($_model->Duration==3){
                $model->FirstHalf=($_model->Type<=2)?($_model->Type==1)?"TL":"CL":"NPL";
                $model->SecondHalf=($_model->Type<=2)?($_model->Type==1)?"TL":"CL":"NPL";
            }
            if($_model->Type<=2){
                if($_model->Duration<=2)
                    $leaveHistoryModel->LeaveCount+=0.5;
                else
                    $leaveHistoryModel->LeaveCount+=1.0;
            }
            $_model->Resolved=1;
            if($leaveHistoryModel->save() && $model->save() && $_model->save())
                return $this->redirect(['index']);     
        }
        
       throw new NotFoundHttpException('Some Issue, Fixing it.');
    }

    /**
     * Updates an existing LeaveRequest model.
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
     * Deletes an existing LeaveRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $_model=$this->findModel($id);
        if($_model->Resolved==1)
            return $this->redirect(['index']);
        $_model->Resolved=1;
        $_model->Reason=$_model->Reason."(Rejected)";
        if($_model->save())    
            return $this->redirect(['index']);
        throw new NotFoundHttpException('Some Issue, Fixing it.');
    }

    /**
     * Finds the LeaveRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LeaveRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function _findModel($EmpId, $Date){
        if(($model=LeaveRequest::findOne(['RaisedEmpId'=>$EmpId,'Date'=>$Date])) !==null){
            return $model;
        }

    }
    protected function findModel($id)
    {
        if (($model = LeaveRequest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
