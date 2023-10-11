 <section id="featured-products" class="product-store position-relative padding-small">
      <div class="container-fluid">
        <div class="row">
          <div class="display-header pb-3 d-flex justify-content-between flex-wrap col-md-12">
            <h2 class="display-2 text-dark text-uppercase">Sản phẩm nổi bật</h2> 
            <a href="#" class="btn btn-medium btn-arrow btn-normal position-relative">
              <span class="text-uppercase">Cửa hàng</span>            
              <svg class="arrow-right position-absolute" width="18" height="20">
                <use xlink:href="#arrow-right"></use>
              </svg>
            </a>
          </div>
        </div>
        <div class="row">
          <div id="featured-swiper" class="product-swiper col-md-12">
            <div class="swiper">
              <div class="swiper-wrapper">
                
                <?= $this->render('product/product1') ?>
                <?= $this->render('product/product2') ?>
                <?= $this->render('product/product3') ?>
                <?= $this->render('product/product4') ?>
                <?= $this->render('product/product5') ?>
                <?= $this->render('product/product6') ?>
                
                
                
                
              </div>
            </div>
            <div class="swiper-pagination text-center mt-5"></div>
          </div>
        </div>
      </div>      
    </section>