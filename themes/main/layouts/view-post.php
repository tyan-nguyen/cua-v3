<?php 
use app\modules\admin\models\Settings;

$setting = Settings::find()->one();
?>

<?= $this->render('head') ?>

<?= $this->render('header', compact('setting')) ?>


<?= $content ?>
		

<?= $this->render('brand') ?>

<?= $this->render('end', compact('setting')) ?>