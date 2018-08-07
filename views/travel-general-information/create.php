<?php

use yii\helpers\Html;

$this->title = 'New Travel Ticket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-general-information-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
