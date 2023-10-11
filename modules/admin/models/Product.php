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
    
    public function getVersions()
    {
        return $this->hasMany(ProductColors::class, ['id_product' => 'id']);
    }
    
    public function getPimages()
    {
        return $this->hasMany(ProductImages::class, ['id_product' => 'id']);
    }
    
    /**
     * delete file
     */
    public function beforeDelete()
    {
        //delete version
        foreach ($this->versions as $ver){
            $ver->delete();
        }
        //delete image
        foreach ($this->pimages as $img){
            $img->delete();
        }
        parent::beforeDelete();
        return true;
    }
    
}
