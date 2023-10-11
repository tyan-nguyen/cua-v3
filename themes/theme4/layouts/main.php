<?php
use app\assets\Theme4Asset;
use yii\helpers\Html;
use app\modules\admin\models\CatelogiesQuery;
use app\modules\admin\models\Socials;
use app\modules\admin\models\Links;
use app\modules\admin\models\Settings;
use app\models\Custom;

$setting = Settings::find()->one();
$custom = new Custom();
$socials = Socials::find()->orderBy('priority ASC')->all();
$links = Links::find()->orderBy('priority ASC')->all();

$catQuery = new CatelogiesQuery;
$cats = $catQuery->getListParent();

Theme4Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" >
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>    
    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-BRD5LNT54B"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'G-BRD5LNT54B');
	</script>	
</head>

<body>
<?php $this->beginBody() ?>

    <?= $this->render('_nav', ['socials'=>$socials,'cats'=>$cats, 'setting'=>$setting])?>
    
    <?= $this->render('_trending', ['custom'=>$custom])?>
    
    <?php // $this->render('_listNew', ['custom'=>$custom])?>
    
    <?php // $this->render('_popularPost', ['custom'=>$custom])?>
    
    <?= $this->render('_catelogies', ['custom' => $custom, 'cats'=>$cats]) ?>
    
    <?= $this->render('_newsletter') ?>
    
    <?= $this->render('_footer', ['links' => $links, 'socials'=>$socials, 'setting'=>$setting]) ?>     

<?php $this->endBody() ?>

<script>
    eval(mod_pagespeed_KpCH1a$C_m);
    eval(mod_pagespeed_Ej3jj9tqUo);
    eval(mod_pagespeed_Pkx$Oz4Gi9);
    eval(mod_pagespeed_9lpIcAXJZV);
    eval(mod_pagespeed_GIrE68D1a2);
</script>

</body>
</html>
<?php $this->endPage() ?>