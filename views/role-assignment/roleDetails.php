<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\RoleAssignment;
use yii\Helpers\ArrayHelper;
?>
<?php $_userTypes=ArrayHelper::map(RoleAssignment::findAll(['Users'=>$UserId]),'id','UserType');?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
            'rowOptions'=>['class'=>'UserTypes'],
        'columns' => [

            [
            'class' => 'yii\grid\CheckboxColumn', 
            'checkboxOptions' => function($model) use ($_userTypes) {
                foreach($_userTypes as $u){
                    if($u==$model->id)
                        return ["checked"=>1];
                }
                return [""];
                //RoleAssignment::find(['Users'=>$user_model->Users])->all()[0]['UserType']

            },
             ],       
            //'id',
            ['attribute'=>'value',
            'label'=>'Role Name',   
            ],
            'description',
            
        ],
    ]); ?>
<?= Html::button($content='Submit',$options=['class'=>'btn btn-primary','id'=>'add_role'])?>
<script type="text/javascript">
    $('#w1-success').css('display','none');
    $('#add_role').click(function(){
        $('tr.UserTypes').each(function(){
            var UserType=$(this).attr('data-key');
            var UserTypeValue=$(this).children().find('input[type="checkbox"]')[0].checked;
            if(UserTypeValue==true){
                $.ajax({
                    type:'POST',
                    url:'create',
                    data:{'UserType':UserType,'User':$("#roleassignment-users").val()},
                    success:function(response){
                        console.log("updated");
                    }
                });
            }
            else{
                $.ajax({
                    type:'POST',
                    url:'delete',
                    data:{'UserType':UserType,'User':$("#roleassignment-users").val()},
                    success:function(response){
                        console.log("delted");
                    }
                });   
            }
        });
        $('#w1-success').html('<i class="icon fa fa-check"></i> Updated Successfully');
        $('#w1-success').css('display','block');

    });
</script>