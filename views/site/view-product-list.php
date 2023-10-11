<?php
use app\modules\admin\models\ProductQuery;
?>
<div class="container-fluid container-fluid-extend padding-small bg-building">
	<div class="row">
          <div class="col-md-12">
             <section class="hero-section position-relative bg-gray">
              <div class="hero-content">
                <div class="container">
                  <div class="row text-center">
                  	  <h1 class="display-1"><?= $catelogy->name ?></h1>
                      <div class="breadcrumbs text-center">
                        <span class="item">
                          <a href="#">Hệ cửa /</a>
                        </span>                
                        <span class="item"><?= $catelogy->name ?></span>
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
		<?php
		  $itemCount = 0;
		  foreach ($catChild as $child): 
		      $itemCount++;
		  ?>
		  
		  <div class="row <?= $itemCount>1?'pt-5':'' ?>">
              <div class="col-md-12">
                <div class="display-header d-flex flex-wrap justify-content-between pb-3">
                  <h2 class="display-2 display-2-small text-dark text-uppercase"><?= $child->name ?></h2>
                  <a href="<?= $child->url ?>" class="btn btn-medium btn-arrow btn-normal position-relative">
                    <span class="text-uppercase">Xem tất cả</span>            
                    <svg class="arrow-right position-absolute" width="18" height="20">
                      <use xlink:href="#arrow-right"></use>
                    </svg>
                  </a>
                </div>
              </div>
         </div>
		  
		  <div class="row">
    		  <?php 
    		  $products = ProductQuery::getProductByCat($child->slug);
    		  foreach($products as $product):?>
              <div class="col-md-3 mb-3 product-item link-effect">
                <div class="image-holder position-relative">
                  <a href="<?= $product->url ?>">
                    <img src="<?= $product->cover ?>" alt="categories" 
                    class="product-image img-fluid"
                    >
                  </a>
                  <div class="product-content">
                    <h5 class="element-title text-uppercase fs-5 mt-3">
                      <a href="<?= $product->url ?>"><?= $product->title ?></a>
                    </h5>
                    <a href="<?= $product->url ?>" class="text-decoration-none" data-after="Xem chi tiết &  Đặt hàng">
                      <span>Cửa nhôm</span>
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
         </div>
		<?php endforeach; ?>
	
	
	
	   <!-- 
		<div class="row">
          <div class="col-md-12">
            <div class="display-header d-flex flex-wrap justify-content-between pb-3">
              <h2 class="display-2 display-2-small text-dark text-uppercase">HỆ CỬA ĐI</h2>
              <a href="/site/productss?id=1" class="btn btn-medium btn-arrow btn-normal position-relative">
                <span class="text-uppercase">Xem tất cả</span>            
                <svg class="arrow-right position-absolute" width="18" height="20">
                  <use xlink:href="#arrow-right"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
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
        
        
        
        
        <div class="row pt-5">
          <div class="col-md-12">
            <div class="display-header d-flex flex-wrap justify-content-between pb-3">
              <h2 class="display-2 display-2-small text-dark text-uppercase">HỆ CỬA SỔ</h2>
              <a href="/site/productss?id=2" class="btn btn-medium btn-arrow btn-normal position-relative">
                <span class="text-uppercase">Xem tất cả</span>            
                <svg class="arrow-right position-absolute" width="18" height="20">
                  <use xlink:href="#arrow-right"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
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
        </div>-->
        
        
        
        
	</div><!-- container -->
</main>