<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\admin\models\Catelogies;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'code',
    ], */
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'title',
        'format'=>'raw',
        'value'=>function($model){
            return Html::a($model->title, $model->urlEdit, [/* 'target'=>'_blank', */ 'data-pjax'=>0]);
        }
    ],
    
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'catelogies',
        'filter'=>Html::activeDropDownList($searchModel, 'catelogies', (new Catelogies())->getListSlug(),
            ['class'=>'form-control', 'prompt'=>'--Select--']),
        'format'=>'html',
        'value'=>function($model){
            return $model->getCatelogiesView();
        }
    ], */
    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'post_status',
        'label'=>'Page Status',
        //'value'=>'postStatusLabel',
        'format'=>'html',
        'value'=>function($model){
            return $model->getPostStatusView();
        },
        'filter'=>Html::activeDropDownList($searchModel, 'post_status', $searchModel->postStatus, 
            ['class'=>'form-control', 'prompt'=>'--Select--'])
    ],
    
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'site_keywords',
    ], */
    
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'slug',
    ], */
   /*  [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'summary',
    ], */
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'JFTS',
        'attribute'=>'just_for_this_site',
        //'filter'=>Html::activeDropDownList($searchModel, 'just_for_this_site', [''=>'--Select--','0'=>'Không', '1'=>'Có'],
        //    ['class'=>'form-control']),
        'filter'=>false,
        'value'=>function($model){
            return $model->just_for_this_site ? 'YES' : 'NO';
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'site_id',
    ],
    */
    /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'site_link',
    ], */
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'content',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'date_created',
    // ],
   /*  [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'buttons' => [
            'update' => function ($url, $model, $key) {
            return yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                Yii::getAlias('@web') . '/admin/news/update?id=' . $model->id
                , [
                    //'class' => 'btn btn-info btn-xs grid-action',
                    'title' => Yii::t('app', 'Update'),
                    'role'=>'modal-remote1',
                    'data-pjax'=>0,
                    'data-toggle'=>'tooltip',
                    'target'=>'_blank'
                ]);
            },
            ],
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ], */

];   