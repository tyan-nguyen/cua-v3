<?php
use app\modules\admin\models\Catelogies;
?>
<div class="container-fluid container-fluid-extend padding-medium">

<div class="row ">

<?php 
$query = Catelogies::find()->where('pid IS NULL OR pid = 0')->andFilterWhere([
    'type' => 'PRODUCT',
]);
$catCount = $query->count();
if($catCount == 1){
    $catCls = 'col-lg-12 col-md-12';
} else if($catCount == 2){
    $catCls = 'col-lg-6 col-md-6';
} else{
    $catCls = 'col-lg-4 col-md-6';
}
$cats = $query->all();
$iCat = 0;
foreach ($cats as $cat):
$iCat++;
?>

<div class="<?= $catCls ?> mb-2">
 <section id="collections<?= $iCat ?>" class="position-relative padding-small">
      <div class="container-fluid">
        <div class="row">
          <div class="swiper collection-swiper collection-swiper<?= $iCat ?>">
            <div class="swiper-wrapper text-center">
              
              <?= $this->render('collection3/slide12', compact('cat')) ?>
              <?= $this->render('collection3/slide2', compact('cat')) ?>
              <?= $this->render('collection3/slide3', compact('cat')) ?>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination<?= $iCat ?> position-absolute text-center" style="bottom:0"></div>
    </section>
</div>
<?php endforeach; ?>


<?php /* ?>

<div class="col-lg-4 col-md-6">
 <section id="collections1" class="position-relative padding-small">
      <div class="container-fluid">
        <div class="row">
          <div class="swiper collection-swiper collection-swiper1">
            <div class="swiper-wrapper">
              
              <?= $this->render('collection2/slide1') ?>
              <?= $this->render('collection2/slide2') ?>
              
              <?= $this->render('collection2/slide3') ?>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination1 position-absolute text-center"></div>
    </section>
</div>


<div class="col-lg-4 col-md-6">
 <section id="collections2" class="position-relative padding-small">
      <div class="container-fluid">
        <div class="row">
          <div class="swiper collection-swiper collection-swiper2">
            <div class="swiper-wrapper">
              
              <?= $this->render('collection2/slide4') ?>
              <?= $this->render('collection2/slide5') ?>
              
              <?= $this->render('collection2/slide6') ?>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination2 position-absolute text-center"></div>
    </section>
</div>   
<div class="col-lg-4 col-md-6">
 <section id="collections3" class="position-relative padding-small">
      <div class="container-fluid">
        <div class="row">
          <div class="swiper collection-swiper collection-swiper3">
            <div class="swiper-wrapper">
              
              <?= $this->render('collection2/slide7') ?>
              <?= $this->render('collection2/slide8') ?>
              
              <?= $this->render('collection2/slide9') ?>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination3 position-absolute text-center"></div>
    </section>
</div> 

<?php */ ?>

</div>

</div>