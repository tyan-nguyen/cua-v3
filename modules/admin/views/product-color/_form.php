<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductColors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-colors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id_product')->textInput() ?>

    <?= $form->field($model, 'color')->dropDownList($model->getColorList(), ['prompt'=>'-Select-']) ?>

    <?= $form->field($model, 'thumbnail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
