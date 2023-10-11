<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TagList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-list-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?php $nameLabel = $model->getAttributeLabel('title') 
    	. ' <span class="seoButton label label-warning" title="Thay đổi liên kết"><i class="glyphicon glyphicon-link"></i></span>' ?>
    	
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label($nameLabel) ?>
    
    <div class="dSeo" style="display:none">

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date_created')->textInput() ?>
    
    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
    	
    <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
	</div>
	
	<script>
    $('.seoButton').on('click', function(){
    	$('.dSeo').toggle();
    });
    </script>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
