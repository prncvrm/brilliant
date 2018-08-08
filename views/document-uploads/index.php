<?php
/* @var $this yii\web\View */
use dosamigos\fileupload\FileUploadUI;
use yii\grid\GridView;
use yii\helpers\Html;
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
<style>
span.preview > a >img,.uploaded>img{
	height : 50px !important;
}
</style>
<div class="col-md-10">
          <div class="nav-tabs-custom">
            <?=$this->render('../site/_tabs',['active'=>5,'TGI_id'=>$GeneralInModel->id])?>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              	
              	<?= GridView::widget([
              	'dataProvider' => $dataProvider,
       			 'columns' => [
           		 ['class' => 'yii\grid\SerialColumn'],

            
            	['attribute'=>'Image',
            	'label'=>'Document',
            	'contentOptions' => ['class' => 'uploaded'],
            	'format'=>'image',
            	'value'=>function($model){
            		return $model->Image;
            	}],
            
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}{view}',
            'buttons'=>[
                'delete'=>function($url,$model) use ($GeneralInModel){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', yii\helpers\Url::to(['document-uploads/delete-list', 'id'=>$model->id]),['title'=>Yii::t('app','Delete'),'data-confirm'=>'Are you sure you want to Remove this?','data-method'=>'POST','data-pjax'=>"0"]);
                },
                'view'=>function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $model->Image,['title'=>Yii::t('app','View'),'target'=>"_blank"]);
                },
                
            ],
     	],   	
        ],
    ]); ?>


<?= FileUploadUI::widget([
    'model' => $model,
    'attribute' => 'Image',
    'url' => ['document-uploads/upload', 'TGI_id' => $GeneralInModel->id],
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
</div>
<?=Html::a('Submit',['travel-general-information/final-submit','id'=>$GeneralInModel->id],['class'=>'btn btn-primary']);?>
</div>
</div>
</div>