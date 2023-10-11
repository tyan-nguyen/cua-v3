<?php
use app\modules\admin\models\Catelogies;

//de quy lay menu
function getChildCatalog($parent){
    $listChildCatalogs = Catelogies::find()->where(['pid'=>$parent])->all();
    foreach ($listChildCatalogs as $j=>$catalog1){
        $catHasThisCatalog = Catelogies::find()->where([
            'pid' => $catalog1->id,
        ])->one();
        
        if($catHasThisCatalog == null){
            echo '<li><a href="' . $catalog1->url . '">' . $catalog1->name . '</a></li>';
        } else {
            echo '<li class="has-children">';
            echo '<a href="' . $catalog1->url . '">' . $catalog1->name . '</a>';
            echo '<ul class="dropdown">';
            getChildCatalog($catalog1->id);
            echo '</ul>';
            echo '</li>';
        }
    }
}
?>
<ul class="js-clone-nav d-none d-lg-inline-none text-start site-menu float-end">
    <li class="active"><a href="<?= Yii::getAlias('@web/') ?>"><?= $setting->text_homepage ?></a></li>
    <?php 
        foreach ($cats as $indexCat=>$cat){
            //check model has this catalog
             $catalogHasChid = Catelogies::find()->where([
                'pid' => $cat->id,
            ])->one();
            
            if($catalogHasChid == null){
                echo '<li><a href="' . $cat->url . '">' . $cat->name . '</a></li>';
            } else {
                echo '<li class="has-children">';
                echo '<a href="' . $cat->url . '">' . $cat->name . '</a>';
                echo '<ul class="dropdown">';
                getChildCatalog($cat->id);
                echo '</ul>';
                echo '</li>';
            }
        }
    ?>                  
</ul>