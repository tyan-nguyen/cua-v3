<div class="swiper-slide overflow-hidden">
<div class="product-card">
  <!-- <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
    <h3 class="card-title text-uppercase">
      <a href="#">CỬA NHÔM</a>
    </h3>
  </div> -->
  <div class="image-overlay position-relative">
    <div class="product-image">
      <img src="<?= $cat->img_thiet_ke ?>" alt="product-item" class="product-image img-fluid">
      <div class="text-box box-slide position-absolute">
        <div class="text-content p-3 bg-light">
          <h3><?= $cat->name ?></h3>
          <p>
          <?= $cat->summary ?>
          </p>
          <a href="<?= $cat->url ?>" class="btn btn-medium btn-arrow position-relative mt-5">
                        <span class="text-uppercase">Xem ngay</span>            
                        <svg class="arrow-right position-absolute" width="18" height="20">
                          <use xlink:href="#arrow-right"></use>
                        </svg>
                      </a>   
        </div>
      </div>
    </div>
  </div>                  
</div>
</div>