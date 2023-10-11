<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductColors */
?>
<div class="product-colors-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_product',
            'color',
            'thumbnail',
            'image',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
