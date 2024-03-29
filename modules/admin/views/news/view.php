<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */
?>
<div class="news-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'site_keywords',
            'post_status',
            'catelogies',
            'title',
            'slug:ntext',
            'summary:ntext',
            //'content:ntext',
            'date_created',
            [
                'attribute'=>'just_for_this_site',
                'value'=>$model->just_for_this_site ? 'YES' : 'NO'
            ],
            'site_id',
            'site_link',
            'date_updated',
            'user_created'=>[
                'attribute' => 'user_created',
                'value'=>$model->userCreated
            ],
            'seo_title',
            'seo_description'
        ],
    ]) ?>

</div>
