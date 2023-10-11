<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catelogies */
?>
<div class="catelogies-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'pid',
            'priority',
            'level',
            'seo_title',
            'seo_description'
        ],
    ]) ?>

</div>
