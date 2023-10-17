<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use webvimark\modules\UserManagement\models\User;
use kartik\select2\Select2;
use app\modules\admin\models\TagList;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
/* @var $form yii\widgets\ActiveForm */

    $model->taglist = $model->listTagName;
    if(!$model->isNewRecord){
       $page = $model->is_static;
    }
?>

<!-- editor -->
<script src="<?= Yii::getAlias('@web') ?>/assets/editor/tinymce/tinymce.min.js"></script>
<script src="<?= Yii::getAlias('@web/filemanager/responsivefilemanager.com_fancybox_jquery.fancybox-1.3.4.js') ?>" type="text/javascript" ></script>

<div class="row">
	<?php $form = ActiveForm::begin([
        'id' => 'frmPost',
        //'enableAjaxValidation' => false,
        'options' => [ 'enctype' => 'multipart/form-data' ]
    ]); ?>
	<div class="col-md-9">

    
    
     <?= $form->errorSummary($model) ?>

   	<?php $nameLabel = $model->getAttributeLabel('title') 
    	. ' <span class="sButton label label-warning" title="Thay đổi liên kết"><i class="glyphicon glyphicon-link"></i></span>' ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label($nameLabel) ?>
	
	 <div class="dUrl" style="display:none">
    	<?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    	
    	<?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
    	
    	<?= $form->field($model, 'seo_description')->textarea(['rows' => 3]) ?>
	</div>
	
    <?= $form->field($model, 'summary')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'id'=>'txtContent']) ?>

</div>
<div class="col-md-3">
	<?php if($page==false):?>
	
	 <?php $nameLabel = $model->getAttributeLabel('imgcover') 
    	. ' <a data-toggle="modal"  href="javascript:;" data-target="#myModal" class="btn" type="button"><i class="glyphicon glyphicon-picture"></i></a>' ?>
	 
	 <?= $form->field($model, 'imgcover')->textInput(['maxlength' => true, 'id'=>'fieldID4'])->label($nameLabel) ?>
	 
	 <div id="dCover" class="input-append">	  
    	  <img src="<?= $model->cover ?>" />
    </div>
    <?php endif ?>
    
     <?= $form->field($model, 'post_status')->dropDownList($model->postStatus, []) ?>
     
     <?php // $form->field($model, 'site_keywords')->textInput(['maxlength' => true]) ?>
     
	 <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?php // $form->field($model, 'catelogies')->textInput(['maxlength' => true]) ?>
    
    <?php if($page==false):?>
    
    <div class="form-group">
    	<label>Catelogies</label>
    	<div class="list-catalog">
			<?= $this->render('_catalog-tree', [
					'model'=>$model,
					'catalogLists'=>$catalogLists
			]) ?>
		</div>
    </div>
    
    <?php endif ?>
    
    <?= $form->field($model, 'taglist')->widget(Select2::classname(), [
	    'data' => (new TagList())->getListName(),
	    'language' => 'en',
    		'options' => ['placeholder' => 'Select a tags ...', 'multiple' => true],
	    'pluginOptions' => [
	        'allowClear' => true,
	        'tags' => true,
	        'tokenSeparators' => [';'],
	        'maximumInputLength' => 50
	    ],
	]);
	?>
    
    <?= $form->field($model, 'date_created')->textInput() ?>
    
    <?= $form->field($model, 'date_updated')->textInput() ?>
    
    <?php /* $form->field($model, 'just_for_this_site')->checkbox() ?>
    
    <?= $form->field($model, 'site_id')->textInput() ?>
    
    <?= $form->field($model, 'site_link')->textInput() */ ?>
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?php // Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> Lưu lại', 
		        		['class' => 'btn btn-large btn-primary', 'name'=>'btnsubmit','value'=>'luu']) ?>
		        		
		    <?php if(!$model->isNewRecord):?>
		    <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> Lưu lại và thoát', 
		        ['class' => 'btn btn-large btn-primary', 'name'=>'btnsubmit', 'value'=>'thoat']) ?>
		    <?php endif;?>
	    </div>
	<?php } ?>
</div> 
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
	height : "800",
	
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
      <iframe width="850" height="600" src="/filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=<?= $model->code ?>&akey=<?= User::hasRole('bientapvien') ? '1fdb7184e697ab9355a3f1438ddc6ef9' : '' ?>" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

function responsive_filemanager_callback(field_id){
	//console.log(field_id);
	var url=jQuery('#'+field_id).val();
	//alert('update '+field_id+" with "+url);
	//alert(url);
	$('#dCover img').attr('src', url);
	$('#btnModal2').click();	
}

</script>


  