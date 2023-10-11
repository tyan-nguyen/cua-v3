<?php
use app\modules\admin\models\News;
use app\modules\admin\models\Catelogies;
?>
<div class="section" style="padding-top:4rem;padding-bottom:2rem;">
    <div class="container">
        <div class="row g-5">        
           <?php 
                foreach ($cats as $indexCat=>$cate){
                    //order theo trang quan tri
                    $newCats = News::find()->where("post_status != 'DRAFT'")->andFilterWhere(['like', 'catelogies', $cate->slug])->orderBy([
                        'date_updated' => SORT_DESC,
                        'date_created' => SORT_DESC,
                        'id' => SORT_DESC
                    ])->limit(5)->all();
                    if($newCats != null){
           ?>
        <div class="col-lg-6">
        	
            <div class="row mb-4">
                <div class="col-12">
                	<h2 class="h4 fw-bold">
                        <a href="<?= Yii::getAlias('@web') . Catelogies::URL_CATELOGIES . $cate->slug ?>">
                        	<?= $cate->name ?>
                        </a>
                    </h2>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <?php                
                    foreach ($newCats as $indexNew => $new){
                ?>
                
                <div class="col-lg-12">
                    <div class="post-entry d-md-flex xsmall-horizontal mb-5">
                        <div class="me-md-3 thumbnail mb-3 mb-md-0">
                            <img src="<?= $new->cover ?>" alt="Image" class="img-fluid">
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <?php 
                                	$linking = ',';
                                	$numCount = count($new->catelogiesList);
                                	$indexCount = 0;
                                	foreach ($new->catelogiesList as $indexCat=>$cat){
                                	    $indexCount ++;
                                	    if($indexCount == $numCount)
                                	        $linking = '&mdash;';
                                	?>
                                	<a href="<?= Yii::getAlias('@web') . Catelogies::URL_CATELOGIES . $indexCat ?>" class="category"><?= $cat ?></a>
                                	<?= $linking ?>
                                	<?php 
                                	}
                                	?>
                                    
                                    <span class="date"><?= $custom->convertYMDHIStoDMY($new->date_created) ?></span>
                            </div>
                            <h2 class="heading"><a href="<?= $new->url ?>"><?= $new->title ?></a></h2>
                             <p><?= $new->summary150 ?></p>
                        </div>
                    </div>
                </div>
                
                <?php 
                    }
                ?>
            </div>
             <div style="width:100%">
            	<a class="btn btn-primary float-end" href="<?= Yii::getAlias('@web') . Catelogies::URL_CATELOGIES . $cate->slug ?>">More post</a>
            </div>
        </div>
       <?php
                } //if $newCats != null
            }
        ?>
        </div>
    </div>
</div>