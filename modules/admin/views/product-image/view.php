<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductImages */
?>
<div class="product-images-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_product',
            'thumbnail',
            'image',
            'date_created',
            'user_created',
        ],
    ]) ?>

</div>
