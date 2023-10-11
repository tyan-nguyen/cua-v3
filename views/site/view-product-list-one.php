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

		<div class="row">
		  <?php foreach ($products as $product):?>
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
                  <span><?= $catelogy->name ?></span>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>



        
	</div><!-- container -->
</main>