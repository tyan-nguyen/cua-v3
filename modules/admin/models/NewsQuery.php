<?php

namespace app\modules\admin\models;

use Yii;

class NewsQuery extends \app\modules\admin\models\News
{
    /**
     * get new public
     * if $cat exist load new by $cat
     */
    public static function getNewsPublic($cat=NULL){
        $query = News::find();
        if($cat!=null){
            $query = $query->andFilterWhere(['like', 'catelogies', $cat]);            
        }
        return $query->andFilterWhere(['post_status' => 'PUBLISH', 'is_static'=>0, 'is_product'=>0]);
    }
    
    /**
     * get new show on trending
     */
    public static function getNewsTrending(){
        $setting = \app\models\Settings::find()->one();
        return NewsQuery::getNewsPublic('tin-tuc')->orderBy([
            'date_updated' => SORT_DESC,
            'date_created' => SORT_DESC,
            'id' => SORT_DESC
        ])->limit($setting->number_post_trending)->all();
    }
    /**
     * get new show on menu (bao-gia, dai-ly)
     */
    public static function getLastNewsByCat($cat=NULL){
        $setting = \app\models\Settings::find()->one();
        return NewsQuery::getNewsPublic($cat)->orderBy([
            'date_updated' => SORT_DESC,
            'date_created' => SORT_DESC,
            'id' => SORT_DESC
        ])->limit($setting->number_post_in_menu)->all();
    }
    
    
}
