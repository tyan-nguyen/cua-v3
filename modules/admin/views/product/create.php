<?php

use yii\helpers\Html;

$this->title = 'Add new post';
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\News */

?>

<div class="news-create">
    <?= $this->render('_form', [
        'model' => $model,
        'catalogLists' => $catalogLists
    ]) ?>
</div>
