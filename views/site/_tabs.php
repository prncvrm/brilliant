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
                    'url'=>Url::to(['fare-expense/index','TGI_id'=>5]),
                ],
                [
                    'label'=>'Conveyance Expense',
                    'active'=>($active==2)?true:false,
                    'url'=>Url::to(['fare-expense/indexx','TGI_id'=>5]),
                ],
                ],
              ]);

            ?>