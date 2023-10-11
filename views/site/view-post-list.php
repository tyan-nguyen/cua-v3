<?php 
use app\models\Custom;

$custom = new Custom();
?>
<div class="container-fluid container-fluid-extend padding-small bg-building">
	<div class="row">
          <div class="col-md-12">
            <section class="hero-section d-flex align-items-center">
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="hero-content align-items-center">
                    <h1 class="display-1">Tin tức</h1>
                      <div class="breadcrumbs">
                        <span class="item">
                          <a href="<?= Yii::getAlias('@web') ?>">Trang chủ /</a>
                        </span>
                        <span class="item">Blog</span>
                      </div>
                  </div>
                </div>
              </div>
            </section>
  		</div>
	</div>
</div>

<div class="post-wrap my-5">
    <div class="container-fluid">
      <div class="row">
        <main class="post-list post-card-small">
            <div class="row">
            
            <?php foreach ($model as $indexBlog=>$blog):?>

              <div class="col-lg-4 col-md-6">
                <article class="post-item pb-5 image-zoom-effect">
                  <div class="post-image overflow-hidden">
                    <a href="<?= $blog->url ?>"><img src="<?= $blog->cover ?>" class="img-fluid" alt="<?= $blog->title ?>"></a>
                  </div>
                  <div class="post-content">
                    <div class="post-meta text-uppercase py-3">
                      <span class="meta-date"><?= $custom->convertYMDHIStoDMY($blog->date_updated) ?></span>
                    </div>
                    <h5 class="post-title text-uppercase">
                      <a href="<?= $blog->url ?>"><?= $blog->title ?></a>
                    </h5>
                    <p><?= $blog->summary300 ?></p>
                  </div>
                </article>
              </div>
           	<?php endforeach; ?>
           	 
            </div>

            <!-- <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>" aria-label="Previous">
                    <svg class="arrow-left" width="18" height="20">
                       <use xlink:href="#arrow-left"></use>
                    </svg>
                  </a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>">1</a></li>
                <li class="page-item"><a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>">2</a></li>
                <li class="page-item"><a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>">3</a></li>
                <li class="page-item"><a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>">4</a></li>
                <li class="page-item"><a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="<?= Yii::getAlias('@web/site/posts') ?>" aria-label="Next">
                    <svg class="arrow-right" width="18" height="20">
                      <use xlink:href="#arrow-right"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </nav> -->
            
            <div style="with:100%" class="text-center">
            
            
            <?= $prev == null ? '' : ('<a href="?page=' . $prev .  '" class="btn btn-medium btn-arrow position-relative mt-2"> 
                <i class="fa-solid fa-arrow-left"></i> <span class="text-uppercase">Trang trước</span>            
              </a>') ?>
              
             <?= $next == null ? '' : ('<a href="?page=' . $next .  '" class="btn btn-medium btn-arrow position-relative mt-2">
                <span class="text-uppercase">Trang tiếp theo</span>            
                <i class="fa-solid fa-arrow-right"></i>
              </a>') ?>
                      
        </div>

        </main>
      </div>
    </div>
  </div>

    
    
    
    
    