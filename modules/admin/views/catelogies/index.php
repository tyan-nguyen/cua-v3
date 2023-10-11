<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CatelogiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catelogies';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

if($type=='POST'){
    $this->title = 'Post catelogies';
    $createLink = 'create?type=POST';
    $createTitle = 'Create new post catelogies';
    $reloadLink = '?type=POST';
    $listTitle = 'Post catelogies Listing';
} else if($type=='PRODUCT'){
    $this->title = 'Product Catelogies';
    $createLink = 'create?type=PRODUCT';
    $createTitle = 'Create new product catelogies';
    $reloadLink = '?type=PRODUCT';
    $listTitle = 'Product Catelogies Listing';
}

?>
<div class="catelogies-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i> '.$createTitle, [$createLink],
                        ['role'=>'modal-remote','title'=> $createTitle,'class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i> Reload list', [$reloadLink],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> '.$listTitle,
               // 'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
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
])?>
<?php Modal::end(); ?>
