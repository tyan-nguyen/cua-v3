<div class="container-fluid container-fluid-extend padding-small bg-building">
	<div class="row">
          <div class="col-md-12">
             <section class="hero-section position-relative bg-gray">
              <div class="hero-content">
                <div class="container">
                  <div class="row text-center">
                  	  <h1 class="display-1"><?= $title ?></h1>
                      <div class="breadcrumbs text-center">
                        <span class="item">
                          <a href="#">Hệ cửa /</a>
                        </span>                
                        <span class="item">Hệ cửa nhôm</span>
                      </div>
                  </div>
                </div>
              </div>
            </section>
  		</div>
	</div>
</div>

<main class="main-content py-5">
	<div class="container">
		<?php if($id==1):?>
		<div class="row">
		  <?php for($i=1;$i<=8;$i++):?>
          <div class="col-md-3 mb-3 product-item link-effect">
            <div class="image-holder position-relative">
              <a href="<?= Yii::getAlias('@web/site/product') ?>">
                <img src="<?= Yii::getAlias('@web') ?>/img/product-item1.png" alt="categories" 
                class="product-image img-fluid"
                >
              </a>
              <div class="product-content">
                <h5 class="element-title text-uppercase fs-5 mt-3">
                  <a href="<?= Yii::getAlias('@web/site/product') ?>">Cửa đi một cánh</a>
                </h5>
                <a href="<?= Yii::getAlias('@web/site/product') ?>" class="text-decoration-none" data-after="Xem chi tiết &  Đặt hàng">
                  <span>Cửa nhôm</span>
                </a>
              </div>
            </div>
          </div>
        <?php endfor; ?>
        </div>
		<?php endif;?>
		<?php if($id==2):?>
		<div class="row">
		  <?php for($i=1;$i<=8;$i++):?>
          <div class="col-md-3 mb-3 product-item link-effect">
            <div class="image-holder position-relative">
              <a href="<?= Yii::getAlias('@web/site/product') ?>">
                <img src="<?= Yii::getAlias('@web') ?>/img/product-item6.png?v=1" alt="categories" class="product-image img-fluid">
              </a>
              <div class="product-content">
                <h5 class="element-title text-uppercase fs-5 mt-3">
                  <a href="<?= Yii::getAlias('@web/site/product') ?>">Cửa sổ 3 cánh</a>
                </h5>
                <a href="<?= Yii::getAlias('@web/site/product') ?>" class="text-decoration-none" data-after="Xem chi tiết & Đặt hàng">
                  <span>Cửa nhôm</span>
                </a>
              </div>
            </div>
          </div>
        <?php endfor; ?>
        </div>
        <?php endif;?>

        
	</div><!-- container -->
</main>