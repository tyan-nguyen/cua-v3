<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */

if($model->is_static == true){
    $pageLabel = 'Page';
} else {
    $pageLabel = 'Post';
}
?>
<div class="news-update">

<?php 
if(isset($fromcreate) && $fromcreate == true){
?>
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok"></span> <?= $pageLabel ?> created!
</div>
<?php } ?>

<?php 
if(isset($status) && $status == 'success'){
?>
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok"></span> <?= $pageLabel ?> updated!
</div>
<?php } ?>

    <?= $this->render('_form', [
        'model' => $model,
        'catalogLists' => $catalogLists
    ]) ?>

</div>
