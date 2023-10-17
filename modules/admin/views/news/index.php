<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if($page!=null){
    $this->title = 'Pages';
    $createLink = 'create?page=true';
    $createTitle = 'Create new page';
    $reloadLink = '?page=true';
    $listTitle = 'Page Listing';
} else {
    $this->title = 'News';
    $createLink = 'create';
    $createTitle = 'Create new post';
    $reloadLink = '';
    $listTitle = 'News Listing';
}

$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>

<style>
.modal-dialog {
    width: 90%!important;
}
@media (max-width: 800px) {
   .modal-dialog {
      width: 99%!important; 
   }
}
</style>

<!-- editor -->
<script src="<?= Yii::getAlias('@web') ?>/assets/editor/tinymce/tinymce.min.js"></script>
<script src="https://www.responsivefilemanager.com/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript" ></script>

<?php 
if(isset($_GET['showUpdateSuccess']) && $_GET['showUpdateSuccess'] == true):
?>
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <span class="glyphicon glyphicon-ok"></span> <?= $this->title ?> updated!
</div>
<?php endif; ?>


<div class="news-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
            'columns' => $page==true ? require(__DIR__.'/_columns_page.php') : require(__DIR__.'/_columns_post.php'),
            'summary'=>'<i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp; Total: <strong>{totalCount}</strong> records',
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> '.$createTitle, [$createLink],
                    [/* 'target'=>'_blank', */ 'data-pjax'=>0, 'title'=> $createTitle,'class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload List', [$reloadLink],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
                    //'{toggleData}'.
                    //'{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> '.$listTitle,
                //'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    "clientOptions" => [
        "backdrop" => "static", "keyboard" => false
    ]
])?>
<?php Modal::end(); ?>
