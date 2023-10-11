<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site_copyright')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_homepage')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'site_title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'site_description')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'site_address')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'site_phone')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'site_email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'site_hotline')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'number_post_trending')->textInput(['maxlength' => true]) ?>
    <?php // $form->field($model, 'number_post_catalog_home')->textInput(['maxlength' => true]) ?>
    <?php // $form->field($model, 'number_post_like_in_news')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'number_post_per_page')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'number_post_in_menu')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'show_cover_after_summary')->checkbox() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
