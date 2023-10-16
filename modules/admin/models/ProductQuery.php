<?php

namespace app\modules\admin\models;

use Yii;

class ProductQuery extends \app\modules\admin\models\Product
{
    /**
     * get new public
     * if $cat exist load new by $cat
     */
    public static function getProductPublic($cat=NULL){
        $query = Product::find();
        if($cat!=null){
            $query = $query->andFilterWhere(['like', 'catelogies', $cat]);
        }
        return $query->andFilterWhere(['post_status' => 'PUBLISH', 'is_product'=>1]);
    }
    
    /**
     * get product by categories
     */
    public static function getProductByCat($cat=NULL){
        return ProductQuery::getProductPublic($cat)->orderBy([
            //'date_updated' => SORT_DESC,
            //'date_created' => SORT_DESC,
            'id' => SORT_ASC
        ])->all();
    }
    
}