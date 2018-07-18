<?php

namespace app\controllers;

use Yii;
use app\models\AttendanceIn;
use app\models\AttendanceInSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Employee;
use app\models\Months;
use app\models\Years;
use yii\db\Query;
use app\models\Branch;
use app\models\ChangeRequest;
/**
 * AttendanceInController implements the CRUD actions for AttendanceIn model.
 */
    function add_zero($num){
        if((int)$num<10){
          return "0".(String)$num;
        }
        else
            return $num;
    }

  function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    /** arp -a **/
     function get_client_mac($ip){
        $arp_data=preg_split("/[\s,]+/",shell_exec("arp -a"));
        for ($i=8;$i<count($arp_data);$i++) {
            if(strcmp($ip,$arp_data[$i])==0){
                return ($arp_data[$i+1]);
                break;
            }
        }
        return ""; 
    }
class AttendanceInController extends Controller
{
    /** get client ip addree**/

   
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AttendanceIn models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $mac=get_client_mac(get_client_ip());
        $employeeModel=Employee::findIdentityByMacAddress($mac);
        if($employeeModel!=null){
            $model = new AttendanceIn();
            date_default_timezone_set('Asia/Calcutta');
            $model=AttendanceIn::findIdentityByUniqueKeys($employeeModel->id,date("Y-m-d"));
            if($model==null){
                $model= new AttendanceIn();
                $model->EmployeeId=$employeeModel->id;
                $model->Date=date("Y-m-d");
                $model->Time=date("H:i:s");
                if($model->validate() && $model->save()){
                    return $this->renderPartial('attendance-in-success', [
                    'employeeModel'=>$employeeModel,
                    'model'=>$model,
                ]);
                }
                else{
                    print_r("Error Occured");
                    return;
                }
            }
            return AttendanceInController::actionOut();
            /*return $this->renderPartial('attendance-in-success', [
                    'employeeModel'=>$employeeModel,
                    'model'=>$model,
                ]);*/
        }
       else{
            print_r("<h1><p style='color:red;background-color:pink;border-color:#c3e6cb;'>No Such Device/Employee Registered</p></h1>");
            return;
        }
       
    }

    public function actionOut()
    {   
        $mac=get_client_mac(get_client_ip());
        $employeeModel=Employee::findIdentityByMacAddress($mac);
        if($employeeModel!=null){
            $model = new AttendanceIn();
            date_default_timezone_set('Asia/Calcutta');
            $model=AttendanceIn::findIdentityByUniqueKeys($employeeModel->id,date("Y-m-d"));
            if($model==null){
                print_r("<h1><p style='color:red;background-color:pink;border-color:#c3e6cb;'>No In Attendance Marked For the Day. Please Ask Admin, to update it if you have missed it.</p></h1>");
                return;
            }
            $model->OutTime=date("H:i:s");
            if($model->validate() && $model->save()){
            return $this->renderPartial('attendance-out-success', [
                    'employeeModel'=>$employeeModel,
                    'model'=>$model,
                ]);
            }
            else{
                print_r("Error Occured");
                    return;
            }
        }
       else{
            print_r("<h1><p style='color:red;background-color:pink;border-color:#c3e6cb;'>No Such Device/Employee Registered</p></h1>");
            return;
        }
       
    }


    /**
     * Displays a single AttendanceIn model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAttendanceInView()
    {
        $no_days=new Query;
        $no_days->select('Days')->from('months')->where(['id'=>Yii::$app->request->queryParams['AttendanceInSearch']["Month"]]);
        $_no_days = $no_days->all();
        $start=Yii::$app->request->queryParams['AttendanceInSearch']["Year"]."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-"."01";
        $end=Yii::$app->request->queryParams['AttendanceInSearch']["Year"]."-".add_zero(Yii::$app->request->queryParams['AttendanceInSearch']["Month"])."-"."31";
        
        $present_days=AttendanceIn::find()->where(['EmployeeId'=>Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"]])->andWhere(['and','Date>='.'"'.$start.'"','Date<='.'"'.$end.'"'])->all();
        $pst_days=[];
        foreach ($present_days as $pd) {
            $pst_days[$pd["Date"]]=['InTime'=>$pd["Time"],'OutTime'=>$pd["OutTime"],"Resolved"=>(ChangeRequest::findOne(['RaisedEmpCode'=>Yii::$app->request->queryParams['AttendanceInSearch']["EmployeeId"],'Date'=>$pd["Date"]])["Resolved"])];
            
        }
        $searchModel = new AttendanceInSearch();
        return $this->render('attendance-in-view', [
            'searchModel' => $searchModel,
            'no_days'=>(int)$_no_days[0]["Days"],
            'present_days'=>$pst_days,
        ]);
    }

    /**
     * Creates a new AttendanceIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AttendanceIn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AttendanceIn model.
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
     * Deletes an existing AttendanceIn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AttendanceIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AttendanceIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AttendanceIn::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
