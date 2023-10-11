<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductImages */

?>
<div class="product-images-create">
    <?= $this->render('_form', [
        'model' => $model,
        'idProduct'=>$idProduct
    ]) ?>
</div>
