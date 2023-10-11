<?php

namespace app\modules\admin\models;

use Yii;

class Product extends \app\modules\admin\models\News
{
    /**
     * get post link publish
     */
    public function getUrl(){
        return Yii::getAlias('@web/product/') . $this->slug;
    }
    
    /**
     * get new link edited
     */
    public function getUrlEdit(){
        return Yii::getAlias('@web/admin/product/update?id=') . $this->id;
    }
    
}
