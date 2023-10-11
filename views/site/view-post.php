<div class="container-fluid container-fluid-extend padding-small bg-building">
	<div class="row">
          <div class="col-md-12">
            <section class="hero-section d-flex align-items-center">
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="hero-content align-items-center">
                    <h1 class="display-1 hero-title"><?= $blog->title ?></h1>
                      <div class="breadcrumbs">
                        <span class="item">
                          <a href="<?= Yii::getAlias('@web') ?>">Trang chủ /</a>
                        </span>
                        <span class="item"><?= $titlePage ?></span>
                      </div>
                  </div>
                </div>
              </div>
            </section>
  		</div>
	</div>
</div>

<div class="post-wrap padding-small overflow-hidden">
      <div class="container">
        <div class="row">
          <main>
            <div class="row">
              <article class="post-item">
                <div class="post-content">
            		<?= $blog->content ?>
                </div>
              </article>

            </div>
          </main>
        </div>
      </div>
    </div>
    
<?= $isPage==false ? $this->render('../../themes/main/layouts/article', ['title'=>'Tin tức khác']) : '' ?>