<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductColors */

?>
<div class="product-colors-create">
    <?= $this->render('_form', [
        'model' => $model,
        'idProduct'=>$idProduct
    ]) ?>
</div>
