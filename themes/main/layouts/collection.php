 <section id="collections" class="position-relative padding-small">
      <div class="container-fluid">
        <div class="row">
          <div class="swiper collection-swiper">
            <div class="swiper-wrapper">
              
              <?= $this->render('collection/slide1') ?>
              <?= $this->render('collection/slide2') ?>
              
              <?= $this->render('collection/slide4') ?>
              
              <?= $this->render('collection/slide3') ?>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination position-absolute text-center"></div>
    </section>