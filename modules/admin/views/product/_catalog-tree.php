<?php
use yii\helpers\Html;
use app\modules\admin\models\Catelogies;


function getChildCatalog($model, $pid, $level){
	$marginLeft = $level+30;
	$listChildCatalogs = Catelogies::find()->where(['pid'=>$pid])->all();
	if($listChildCatalogs != null){
		foreach ($listChildCatalogs as $j=>$catalog1){
			$postHasThisCatalog = false;
			foreach ($model->catelogiesList as $indexCat1=>$cat1){
			    if($indexCat1 == $catalog1->slug){
			        $postHasThisCatalog = true;
			    }
			}
			
			echo '<br/><span style="margin-left:'.$marginLeft.'px"></span>';
			//echo Html::checkbox("dm[$catalog1->id]", ($postHasThisCatalog && $check == true)!=null?true:false);
			//echo '&nbsp;' . $catalog1->name;
			
			echo Html::checkbox("Product[catalog][$catalog1->slug]", $postHasThisCatalog);
			echo '&nbsp;' . $catalog1->name;
			
			getChildCatalog($model, $catalog1->id, $marginLeft);
		}
	}
}

	
foreach ($catalogLists as $i=>$catalog){
	//check model has this catalog
    $postHasCatalog = false;
    foreach ($model->catelogiesList as $indexCat=>$cat){
        if($indexCat == $catalog->slug){
            $postHasCatalog = true;
        }
    }
	
	if($i>0)
		echo '<br/>';
	//echo Html::checkbox("dm[$catalog->id]", ($postHasCatalog !=null && !$model->isNewRecord)?true:false);
	//echo '&nbsp;' . $catalog->name;
	
	echo Html::checkbox("Product[catalog][$catalog->slug]", $postHasCatalog);
	echo '&nbsp;' . $catalog->name;
	getChildCatalog($model, $catalog->id, 0);
}
	
?>