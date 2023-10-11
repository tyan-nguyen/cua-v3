<?php
use app\assets\Theme4Asset;
use yii\helpers\Html;
use app\modules\admin\models\Catelogies;
use app\modules\admin\models\Socials;
use app\modules\admin\models\Links;
use app\modules\admin\models\Settings;

$setting = Settings::find()->one();
$cats = Catelogies::find()->where('pid IS NULL OR pid = 0')->orderBy('priority ASC')->all();

Theme4Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
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

 <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <div class="row">
                    <div class="col-md-6 text-center order-1 order-md-2 mb-3 mb-md-0">
                         <a href="<?= Yii::getAlias('@web/') ?>" class="logo m-0 text-uppercase">
						<?php // $setting->site_name ?>
						<img src="<?= Yii::getAlias('@web/images/icons/logo.png') ?>?v=1" width="auto" height="50px" />
						</a>
                    </div>
                    <div class="col-md-3 order-3 order-md-1">
                        <form id="frmSearch" action="<?= Yii::getAlias('@web/site/search') ?>" method="get" class="search-form">
                            <span class="icon-search2"></span>
                            <input name="search" type="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" class="form-control" onblur="formSeachSubmit()" placeholder="Search...">
                        </form>
                    </div>
                    <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                        <div class="d-flex">
                            <ul class="list-unstyled social me-auto">
                            
                            	<?php 
                            	   $socials = Socials::find()->orderBy('priority ASC')->all();
                            	   foreach ($socials as $indexSocial => $social){
                            	?>
                            	<li><a  rel="nofollow" href="<?= $social->link ?>"><?= $social->icon ?></a></li>
                            	<?php 
                            	   }
                            	?>
                            </ul>
                            <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block" data-toggle="collapse" data-target="#main-navbar">
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?= $this->render('_menu', ['cats'=>$cats, 'setting'=>$setting]) ?>
            </div>
        </div>
    </nav>
    





<?= $content ?>
    
    
    
    
    
    
    
    
    
    <div class="py-5 bg-light mx-md-3 sec-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h4 fw-bold">Subscribe to newsletter</h2>
                </div>
            </div>
            <form action="<?= Yii::getAlias('@web/site/newsletter') ?>" method="get" class="row">
                <div class="col-md-8">
                    <div class="mb-3 mb-md-0">
                        <input name="email" type="email" class="form-control" required placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-4 d-grid">
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </div>
            </form>
        </div>
    </div>
    <div class="site-footer">
        <div class="container">
            <div class="row justify-content-center copyright">
                <div class="col-lg-7 text-center">
                    <div class="widget">
                        <ul class="social list-unstyled">
                        		<?php 
                            	   $socials = Socials::find()->orderBy('priority ASC')->all();
                            	   foreach ($socials as $indexSocial => $social){
                            	?>
                            	<li><a rel="nofollow" href="<?= $social->link ?>"><?= $social->icon ?></a></li>
                            	<?php 
                            	   }
                            	?>
                        </ul>
                    </div>
                    <div class="widget">
                        <?= $setting->site_copyright ?>
                        <div class="d-block">
                        <?php 
                            $links = Links::find()->orderBy('priority ASC')->all();
                            foreach ($links as $indexLink => $link){
                        ?>
                         <a rel="nofollow" <?= $link->open_new_tab ? 'target="_blank"': '' ?> href="<?= $link->link ?>" class="m-2"><?= $link->name ?></a>
                        <?php 
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <script src="<?= Yii::getAlias('@web')?>/assets/theme4/js/bootstrap.bundle.min.js"></script>
        <script src="<?= Yii::getAlias('@web')?>/assets/theme4/js/tiny-slider.js"></script>
        <script src="<?= Yii::getAlias('@web')?>/assets/theme4/js/glightbox.min.js+aos.js+navbar.js+counter.js+custom.js.pagespeed.jc.B7bFTsJZUK.js"></script>
        <script src="<?= Yii::getAlias('@web')?>/assets/theme4/js/custom.js"></script>
        <script>
        eval(mod_pagespeed_KpCH1a$C_m);
        </script>
        <script>
        eval(mod_pagespeed_Ej3jj9tqUo);
        </script>
        <script>
        eval(mod_pagespeed_Pkx$Oz4Gi9);
        </script>
        <script>
        eval(mod_pagespeed_9lpIcAXJZV);
        </script>
        <script>
        eval(mod_pagespeed_GIrE68D1a2);
        </script>
        
        
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
