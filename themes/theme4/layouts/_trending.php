<?php
use app\modules\admin\models\NewsQuery;
use app\modules\admin\models\Catelogies;

$query = new NewsQuery();
?>
<div class="section pb-0" style="padding-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="posts-slide-wrap">
                    <div class="posts-slide" id="posts-slide">                    
                    <?php 
                        //order theo id moi nhat
                        $trending = $query->getNewsTrending();
                        foreach ($trending as $indexTrend=>$new){                                
                    ?>
                    
                    <div class="item">
                            <div class="post-entry d-lg-flex">
                                <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                    <a href="<?= $new->url ?>">
                                        <img src="<?= $new->cover ?>" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="content align-self-center">
                                     
                                    <div class="post-meta mb-3">
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
                        
                                    <h2 class="heading">
                                    <a href="<?= $new->url ?>"><?= $new->title ?></a>
                                    </h2>
                                    <p><?= $new->summary500 ?></p>
                                   <!--  <a href="#" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="assets/theme4/images/xperson_1.jpg.pagespeed.ic.Zebptmx_f8.webp" alt="Image">
                                        </div>
                                        <div class="text">
                                            <strong>Sergy Campbell</strong>
                                            <span>CEO and Founder</span>
                                        </div>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    
                    <?php } ?>
                    

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>