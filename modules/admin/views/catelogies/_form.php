<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Catelogies;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catelogies */
/* @var $form yii\widgets\ActiveForm */

if(!$model->isNewRecord){
    $type = $model->type;
}
?>

<!-- editor -->
<script src="<?= Yii::getAlias('@web') ?>/assets/editor/tinymce/tinymce.min.js"></script>
<script src="https://www.responsivefilemanager.com/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript" ></script>

<div class="catelogies-form">

    <?php $form = ActiveForm::begin(); ?>
    
     <?= $form->errorSummary($model) ?>
     
     <?= $form->field($model, 'type')->hiddenInput(['value' => $type])->label(false); ?>
     
    <?php $nameLabel = $model->getAttributeLabel('title') 
    	. ' <span class="seoButton label label-warning" title="Thay đổi liên kết"><i class="glyphicon glyphicon-link"></i></span>' ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label($nameLabel) ?>

	<div class="dSeo" style="display:none">
	 
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
    	
    <?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
    
    </div>
    
    <script>
    $('.seoButton').on('click', function(){
    	$('.dSeo').toggle();
    });
    </script>

    <div class="row">
    <div class="col-md-6">
    	<?= $form->field($model,'pid')->dropDownList((new Catelogies())->getList($type),
				['class'=>'form-control', 'prompt'=>'--Chọn--']) ?>
    </div>
    <div class="col-md-3">
    	<?= $form->field($model, 'priority')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
    	<?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>
	</div>
	</div>
	<div class="row">
    	<div class="col-md-12">
			<?= $form->field($model, 'summary')->textarea(['rows' => 6, 'id'=>'txtContent']) ?>
  		</div>
  	</div>
  	
  	<?php if($model->pid == 0):?>
  
	 
	 <?= $form->field($model, 'img_phoi_canh')->textInput(['maxlength' => true, 'id'=>'img_phoi_canh']) ?>
	 <?= $form->field($model, 'img_cua')->textInput(['maxlength' => true, 'id'=>'img_cua']) ?>
	 <?= $form->field($model, 'img_thiet_ke')->textInput(['maxlength' => true, 'id'=>'img_thiet_ke']) ?>
	 
	
  	<?php endif; ?>
  	
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<script>
tinymce.remove();
//editor for content
tinymce.init({
	selector: "#txtContent",
	branding: false,
	statusbar: false,
	plugins: "media,image,paste,table,code,link,lists,advlist,responsivefilemanager,hr",
	menubar: 'edit view insert format table',
	toolbar: 'autolink | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist hr | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link unlink anchor codesample | ltr rtl | responsivefilemanager',
  	toolbar_sticky: true,
	paste_data_images: true,
	image_advtab: true,
	image_title: true,
	//images_upload_url: "<?= Yii::getAlias('@web') . '/assets/editor/upload.php' ?>", //upload img tab
	//images_upload_credentials: true,
	relative_urls : false,
	remove_script_host : true,
	document_base_url : "/",
	convert_urls : true,
	height : "200",
	
	external_filemanager_path:"<?= Yii::getAlias('@web') ?>/filemanager/filemanager/",
	filemanager_title:"QUẢN LÝ FILE" ,
	external_plugins: { "filemanager" : "<?= Yii::getAlias('@web') ?>/filemanager/filemanager/plugin.min.js"},
	filemanager_access_key: "<?= User::hasRole('bientapvien') ? '1fdb7184e697ab9355a3f1438ddc6ef9' : '' ?>",

	language_url : '<?= Yii::getAlias('@web')?>/assets/editor/tinymce/langs/vi.js',
		
	setup: function (editor) {
	    editor.on('change', function () {
	        tinymce.triggerSave();
	    });
	}
});

//prevent Bootstrap from hijacking TinyMCE modal focus
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".mce-window").length) {
    e.stopImmediatePropagation();
  }
});
</script>

<div class="modal modal2 fade" id="myModal" >
<div class="modal-dialog1" style="width:900px">
  <div class="modal-content" style="height:700px;">
    <div class="modal-header">
      <button id="btnModal2" data-dismiss="modal" type="button" class="close" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body">
      <iframe width="850" height="600" src="/filemanager/filemanager/dialog.php?type=2&field_id=img_phoi_canh'&fldr=_chung&akey=<?= User::hasRole('bientapvien') ? '1fdb7184e697ab9355a3f1438ddc6ef9' : '' ?>" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
