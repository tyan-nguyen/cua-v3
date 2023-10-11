<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    /* [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ], */
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'header'=>'',
        'attribute'=>'thumbnail',
        'format'=>'raw',
        'value'=>function($model){
        return Html::img($model->thumbnail, ['class'=>'img-small-thumb']);
        }
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'image',
            'format'=>'raw',
            'value'=>function($model){
            return Html::img($model->image, ['class'=>'img-small']);
            }
            ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template'=>'{update} {delete}',
        'urlCreator' => function ($action, $model, $key, $index) {
        
            if ($action === 'update') {
                $url = Yii::getAlias('@web/admin/product-image/update?id='.$model->id);
                return $url;
            }
            if ($action === 'delete') {
                $url = Yii::getAlias('@web/admin/product-image/delete?id='.$model->id);
                return $url;
            }
        
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   