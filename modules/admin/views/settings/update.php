<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Settings */
$this->title = 'Change setting';
?>

<?php 
if(isset($_GET['showUpdateSuccess']) && $_GET['showUpdateSuccess'] == true):
?>
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span class="glyphicon glyphicon-ok"></span> Setting updated!
</div>
<?php endif; ?>

<div class="settings-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
