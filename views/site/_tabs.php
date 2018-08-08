<?php 
use yii\helpers\Url;
use yii\bootstrap\Tabs;
?>
<?=
              Tabs::widget([
                'items'=>[
                  [
                    'label'=>'Fare Expense',
                    'active'=>($active==1)?true:false,
                    'url'=>Url::to(['fare-expense/index','TGI_id'=>$TGI_id]),
                ],
                [
                    'label'=>'Conveyance Expense',
                    'active'=>($active==2)?true:false,
                    'url'=>Url::to(['conveyance-expense/index','TGI_id'=>$TGI_id]),
                ],[
                    'label'=>'Hotel Expense',
                    'active'=>($active==3)?true:false,
                    'url'=>Url::to(['hotel-expense/index','TGI_id'=>$TGI_id]),
                ],[
                    'label'=>'Other Expense',
                    'active'=>($active==4)?true:false,
                    'url'=>Url::to(['other-expense/index','TGI_id'=>$TGI_id]),
                ],[
                    'label'=>'Document Upload',
                    'active'=>($active==5)?true:false,
                    'url'=>Url::to(['document-uploads/index','TGI_id'=>$TGI_id]),
                ],
                ],
              ]);

            ?>