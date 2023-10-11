<?php 
use app\modules\admin\models\Settings;

$setting = Settings::find()->one();
?>

<?= $this->render('head') ?>

<?= $this->render('header', compact('setting')) ?>

<?php /* ?>
<?= $this->render('view-product/hero') ?>
<?= $this->render('view-product/content') ?>
<?= $this->render('view-product/tabs') ?>

<?= $this->render('product') ?>
<?php */ ?>

<?= $content ?>


<?= $this->render('brand') ?>

<?= $this->render('end', compact('setting')) ?>