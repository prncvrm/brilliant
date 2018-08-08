<?php

namespace app\controllers;
use Yii;
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
        if($GeneralInModel->EmployeeId != Yii::$app->user->identity->id)
            throw new NotFoundHttpException('Not Permitted!.');
        $model= new DocumentUploads();
        return $this->render('index', [
            'model'=>$model,
            'GeneralInModel'=>$GeneralInModel,
        ]);
    }

public function actionUpload()
{
    $model = new DocumentUploads();

    $imageFile = UploadedFile::getInstance($model, 'Image');
    $EmpModel=Employee::findOne(['id'=>4]);
    $directory = Yii::getAlias('@web/uploads/travel') . '/' . $EmpModel->EmployeeCode . '/';
            FileHelper::createDirectory($directory,$mode = 0775,$recursive=true);
    if (file_exists($directory)) {
    	print_r("wasHere");
        FileHelper::createDirectory($directory,$mode = 0775,$recursive=true);
    }

    if ($imageFile) {
        $uid = uniqid(time(), true);
        $fileName = $uid . '.' . $imageFile->extension;
        $filePath = $directory . $fileName;
        if ($imageFile->saveAs($filePath)) {
            $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
            return Json::encode([
                'files' => [
                    [
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        'url' => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl' => 'image-delete?name=' . $fileName,
                        'deleteType' => 'POST',
                    ],
                ],
            ]);
        }
    }

    return '';
}

}
