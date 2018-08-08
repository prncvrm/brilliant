<?php

namespace app\controllers;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocumentUploads;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use app\models\Employee;
class DocumentUploadsController extends \yii\web\Controller
{
    public function actionIndex($TGI_id)
    {
    	$GeneralInModel = \app\models\TravelGeneralInformation::findOne(['id'=>$TGI_id]);
        if($GeneralInModel->EmployeeId != Yii::$app->user->identity->Employee || $GeneralInModel->Completed ==1)
            throw new NotFoundHttpException('Not Permitted!.');
        $model= new DocumentUploads();

        $query = DocumentUploads::find();
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		$dataProvider->query->andWhere(['TGIid'=>$TGI_id]);
        return $this->render('index', [
        	'dataProvider' => $dataProvider,
            'model'=>$model,
            'GeneralInModel'=>$GeneralInModel,
        ]);
    }

public function actionUpload($TGI_id)
{
    $model = new DocumentUploads();

    $imageFile = UploadedFile::getInstance($model, 'Image');
    $EmpModel=Employee::findOne(['id'=>\app\models\TravelGeneralInformation::findOne(['id'=>$TGI_id])->EmployeeId]);
    $directory = Yii::getAlias('uploads/travel') . "/" . $EmpModel->EmployeeCode . "/";
    if (!is_dir($directory)) {
        FileHelper::createDirectory($directory);
    }

    if ($imageFile) {
        $uid = uniqid(time(), true);
        $fileName = $uid . '.' . $imageFile->extension;
        $filePath = $directory . $fileName;
        if ($imageFile->saveAs($filePath)) {
        	$model->TGIid=$TGI_id;
            $path = Yii::getAlias('@web').'/uploads/travel/' . $EmpModel->EmployeeCode . "/" . $fileName;
        	$model->Image=$path;
        	$model->save();
            return Json::encode([
                'files' => [
                    [
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        'url' => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl' => 'delete?name=' . $fileName.'&TGI_id='.$TGI_id,
                        'deleteType' => 'POST',
                    ],
                ],
            ]);
        }
    }
    
    return "";
}
public function actionDelete($name,$TGI_id)
{
	$EmpModel=Employee::findOne(['id'=>\app\models\TravelGeneralInformation::findOne(['id'=>$TGI_id])->EmployeeId]);
    $directory = Yii::getAlias('uploads/travel') . "/" . $EmpModel->EmployeeCode;
    
    if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
        unlink($directory . DIRECTORY_SEPARATOR . $name);
    }
    DocumentUploads::findOne(['Image'=>Yii::getAlias('@web').'/uploads/travel/' . $EmpModel->EmployeeCode . "/" . $name])->delete();
    $files = FileHelper::findFiles($directory);
    $output = [];
    foreach ($files as $file) {
        $fileName = basename($file);
        $path = Yii::getAlias('@web').'/uploads/travel/' . $EmpModel->EmployeeCode . "/" . $fileName;
        $output['files'][] = [
            'name' => $fileName,
            'size' => filesize($file),
            'url' => $path,
            'thumbnailUrl' => $path,
            'deleteUrl' => 'delete?name=' . $fileName.'&TGI_id='.$TGI_id,
            'deleteType' => 'POST',
        ];
    }
    return Json::encode($output);
}

public function actionDeleteList($id)
{
	$model=DocumentUploads::findOne(['id'=>$id]);
	
    if (is_file($model->Image)) {
        unlink($model->Image);
    }
    $model->delete();
    
    return $this->redirect(['index','TGI_id'=>$model->TGIid]);
}
}
