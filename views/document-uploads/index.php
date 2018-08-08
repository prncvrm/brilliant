<?php
/* @var $this yii\web\View */
use dosamigos\fileupload\FileUploadUI;
?>
<div class="col-md-2">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
    <label>Purpose Of Travel : </label><br>
    <?= $GeneralInModel->PurposeOfTour;?><br>
    <label>From Date : </label><br>
    <?= $GeneralInModel->From;?><br>
    <label>To Date : </label><br>
    <?= $GeneralInModel->To;?><br>
</div>
</div>
</div>
</div>
<?= FileUploadUI::widget([
    'model' => $model,
    'attribute' => 'Image',
    'url' => ['document-uploads/upload', 'id' => 1],
    'gallery' => false,
    'fieldOptions' => [
        'accept' => 'image/*'
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    // ...
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]); ?>
