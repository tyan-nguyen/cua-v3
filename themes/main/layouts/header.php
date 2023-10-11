<header id="header" class="site-header text-black" style="">
  <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
    <div class="container-fluid container-fluid-extend">
    
    	<?= $this->render('header/logo') ?>
      
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="navbar-icon" width="50" height="50">
          <use xlink:href="#navbar-icon"></use>
        </svg>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
        
        <?= $this->render('header/menu-top', compact('setting')) ?>
        
        <div class="offcanvas-header px-4 pb-0">
          <a class="navbar-brand" href="#">
            <!-- <img src="<?= Yii::getAlias('@web')  ?>/img/logo.png?v=2" class="logo logo-header"> -->
          </a>
          <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
        </div>
        <div id="menu-main" class="offcanvas-body">            	
         	<?= $this->render('header/menu-main', compact('setting')) ?>
        </div>
      </div>
    </div>
  </nav>    
</header>