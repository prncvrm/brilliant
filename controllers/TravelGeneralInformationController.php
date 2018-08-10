<?php

namespace app\controllers;

use Yii;
use app\models\TravelGeneralInformation;
use app\models\TravelGeneralInformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ConveyanceExpenseSearch;
use app\models\OtherExpenseSearch;
use app\models\FareExpenseSearch;
use app\models\HotelExpenseSearch;
use app\models\DocumentUploads;
use app\models\TravelFinal;
/**
 * TravelGeneralInformationController implements the CRUD actions for TravelGeneralInformation model.
 */
class TravelGeneralInformationController extends Controller
{
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
     * Lists all TravelGeneralInformation models.
     * @return mixed
     */
    public function actionReport()
    {
        $searchModel = new TravelGeneralInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['Approve'=>1]);
        $dataProvider->query->andWhere(['Completed'=>1]);
        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    //Generate PartialRendered Report to print too!
    public function actionGeneratereport($id){
        $model=$this->findModel($id);
        if(!TravelFinal::findOne(['TGIid'=>$id]))
            return $this->redirect(['travel-final/create','id'=>$id]);
        if($model==null)
            throw new NotFoundHttpException('No Such Report Found.');
        $ConveyanceExpenseDataProvider = (new ConveyanceExpenseSearch())->search(Yii::$app->request->queryParams);
        $ConveyanceExpenseDataProvider->query->andWhere(['TGIid'=>$id]);
        $ConveyanceExpenseDataProvider->sort->sortParam = false;
        $FareExpenseDataProvider = (new FareExpenseSearch())->search(Yii::$app->request->queryParams);
        $FareExpenseDataProvider->query->andWhere(['TGIid'=>$id]);
        $HotelExpenseDataProvider = (new HotelExpenseSearch())->search(Yii::$app->request->queryParams);
        $HotelExpenseDataProvider->query->andWhere(['TGIid'=>$id]);
        $OtherExpenseDataProvider = (new OtherExpenseSearch())->search(Yii::$app->request->queryParams);
        $OtherExpenseDataProvider->query->andWhere(['TGIid'=>$id]);
        $DocumentUploads=DocumentUploads::find()->where(['TGIid'=>$id])->all();
        return $this->renderPartial('generatereport',['model'=>$model,'ConveyanceExpenseDataProvider'=>$ConveyanceExpenseDataProvider,'OtherExpenseDataProvider'=>$OtherExpenseDataProvider,'FareExpenseDataProvider'=>$FareExpenseDataProvider,'HotelExpenseDataProvider'=>$HotelExpenseDataProvider,'DocumentUploads'=>$DocumentUploads]);
    }


    public function actionIndex($Approved)
    {
        $searchModel = new TravelGeneralInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if($Approved==1)
            $dataProvider->query->andWhere(['Approve'=>1]);
        if(Yii::$app->user->identity->AccessLevel==\app\models\Users::ROLE_MODERATOR)
            $dataProvider->query->andWhere(['EmployeeId'=>Yii::$app->user->identity->Employee]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFinalSubmit($id){
        $model=$this->findModel($id);
        $model->Completed=1;
        $model->save();
        return $this->redirect(['index','Approved'=>1]);

    }

    /**
     * Displays a single TravelGeneralInformation model.
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
     * Creates a new TravelGeneralInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TravelGeneralInformation();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->EmployeeId = Yii::$app->user->identity->Employee;
            $model->Approve= 0;
            $model->Resolved=0;
            $model->save();
            return $this->redirect(['index','Approved'=>0]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionApprove($id){
        $model=$this->findModel($id);
        $model->Approve=1;
        $model->Resolved=1;
        if($model->save())    
            return $this->redirect(['index','Approved'=>0]);
        throw new NotFoundHttpException('Some Issue, Fixing it.');
    }
    public function actionDisapprove($id){
        $model=$this->findModel($id);
        $model->PurposeOfTour=$model->PurposeOfTour." (Rejected)";
        $model->Approve=0;
        $model->Resolved=1;
        if($model->save())    
            return $this->redirect(['index','Approved'=>0]);
        throw new NotFoundHttpException('Some Issue, Fixing it.');
    }

    /**
     * Updates an existing TravelGeneralInformation model.
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
     * Deletes an existing TravelGeneralInformation model.
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
     * Finds the TravelGeneralInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TravelGeneralInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TravelGeneralInformation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
