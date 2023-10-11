<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TagList */
?>
<?php 
if(isset($status) && $status == 'success'){
?>
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok"></span> Tag updated!
</div>
<?php } ?>

<div class="tag-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
