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
					<img src="<?= Yii::getAlias('@web/images/icons/logo.png') ?>?v=1" width="auto" height="50px" />
					</a>
                </div>
                
                <div class="col-md-3 order-3 order-md-1">
                    <form id="frmSearch" action="<?= Yii::getAlias('@web/site/search') ?>" method="get" class="search-form">
                        <span class="icon-search2"></span>
                        <input name="search" type="search"  value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"  
                        	class="form-control" onblur="formSeachSubmit()" placeholder="Search...">
                    </form>
                </div>
                
                <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                    <div class="d-flex">
                        <ul class="list-unstyled social me-auto">                            
                        	<?php 
                        	   foreach ($socials as $indexSocial => $social){
                        	?>
                        		<li><a rel="nofollow" href="<?= $social->link ?>"><?= $social->icon ?></a></li>
                        	<?php 
                        	   }
                        	?>
                        </ul>
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block" 
                        	data-toggle="collapse" data-target="#main-navbar">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div> <!-- row -->
            
           <?= $this->render('_menu', ['cats'=>$cats, 'setting'=>$setting]) ?>
           
        </div>
    </div>
</nav>