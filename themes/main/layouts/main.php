<?php 
use app\modules\admin\models\Settings;

$setting = Settings::find()->one();
?>
<?= $this->render('head') ?>

<?= $this->render('header', compact('setting')) ?>

<?= $this->render('slides') ?>

<?= $this->render('services') ?>

<?php // $this->render('about') ?>

<!-- <div class="container-fluid border-top"></div> -->

<?php // $this->render('product') ?>

<?php //$this->render('quote') ?>

<!-- <div class="container-fluid border-top"></div> -->

<?= $this->render('collection2') ?>

<!-- <div class="container-fluid border-top"></div> -->

<?php // $this->render('subscribe') ?>

<?php // $this->render('trending') ?>

<!-- <div class="container-fluid border-top"></div> -->

<?php /* $this->render('product2') */ ?>

<!-- <div class="container-fluid border-top"></div> -->
<?= $this->render('call-brand') ?>

<?= $this->render('article', ['title'=>'Thông tin mới nhất']) ?>


<?= $this->render('brand') ?>


<?= $this->render('end', compact('setting')) ?>