<?php 
use app\modules\admin\models\NewsQuery;
if(!isset($news)){
    $news = NewsQuery::getNewsTrending();
}
?>
<section id="latest-blog">
      <div class="container-fluid  container-fluid-extend  padding-medium" style="padding-left:2px;padding-right:2px;">
        <div class="row">
          <div class="col-md-12">
            <div class="display-header d-flex flex-wrap justify-content-between pb-3">
              <h2 class="display-2 display-2-small text-dark text-uppercase"><?= $title ?></h2>
              <a href="<?= Yii::getAlias('@web/site/posts') ?>" class="btn btn-medium btn-arrow btn-normal position-relative">
                <span class="text-uppercase">Xem tất cả</span>            
                <svg class="arrow-right position-absolute" width="18" height="20">
                  <use xlink:href="#arrow-right"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="row g-3 post-grid">
        
          <?php 
          foreach ($news as $blog){
              echo $this->render('article_item', compact('blog'));
          }
          ?>
        
        </div>
      </div>
    </section>