
    <section id="product-detail" class="single-product py-5 no-padding-top">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-3">
                <div class="swiper product-thumbnail-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-thumbnail-1.jpg" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-thumbnail-2.jpg" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-thumbnail-3.jpg" alt="" class="thumb-image img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-thumbnail-4.jpg" alt="" class="thumb-image img-fluid">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="swiper product-large-slider">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-large-1.jpg" alt="product-large" class="img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-large-2.jpg" alt="product-large" class="img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-large-3.jpg" alt="product-large" class="img-fluid">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?= Yii::getAlias('@web') ?>/images/product-large-4.jpg" alt="product-large" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="product-info">
              <div class="element-header">
                <h2 itemprop="name" class="product-title text-uppercase">Circle Dining Table</h2>
                <div class="rating-container d-flex align-items-center">
                  <div class="rating" data-rating="1" onclick=rate(1)>
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="2" onclick=rate(1)>
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="3" onclick=rate(1)>
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="4" onclick=rate(1)>
                    <svg width="32" height="32">
                      <use xlink:href="#star-outline"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="5" onclick=rate(1)>
                    <svg width="32" height="32">
                      <use xlink:href="#star-outline"></use>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="product-price mb-3">
                <span class="fs-2">$40.00</span>
                <del>$64.00</del>
              </div>
              <p>Tristique ullamcorper nunc egestas non. Justo, cum feugiat imperdiet nulla molestie ac vulputate
                scelerisque amet. Bibendum adipiscing platea blandit sit sed quam semper rhoncus. Diam ultrices maecenas
                consequat eu tortor. Orci, cras lectus mauris, cras egestas quam venenatis neque.</p>   
              <div class="product-action mt-4">
                <div class="item-title">3 in stock</div>
                <div class="product-quantity d-flex flex-wrap">
                  <div class="input-group product-qty me-3 border" style="max-width: 150px;">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-left-minus btn btn-number" data-type="minus"
                        data-field="">
                        <svg width="16" height="16">
                          <use xlink:href="#minus"></use>
                        </svg>
                      </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number text-center bg-gray-1"
                      value="1" min="1" max="100">
                    <span class="input-group-btn">
                      <button type="button" class="quantity-right-plus btn btn-number" data-type="plus"
                        data-field="">
                        <svg width="16" height="16">
                          <use xlink:href="#plus"></use>
                        </svg>
                      </button>
                    </span>
                  </div>
                  <button type="submit" name="add" id="add-to-cart"
                    class="btn btn-primary product-cart-submit me-3">
                    <span id="add-to-cart">Add to cart</span>
                  </button>
                  <button href="#" class="btn btn-light wish-list-button">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <use xlink:href="#heart"></use>
                    </svg>
                  </button>
                  <div class="detail-list mt-3">
                    <ul>
                      <li>
                        <strong>SKU:</strong>
                        <a href="#">Woo-Belt</a>
                      </li>
                      <li>
                        <strong>Category:</strong>
                        <a href="#">Accessories</a>
                      </li>
                      <li class="no-border-bottom">
                        <strong>Tags:</strong>
                        <a href="#">Black</a>, <a href="#">Wooden</a>, <a href="#">Minimal</a>, <a href="#">Chair</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
