<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "news_catelogies".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $pid
 * @property int|null $priority
 * @property int|null $level
 * @property string|null $summary
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string $type
 * @property string|null $img_phoi_canh
 * @property string|null $img_cua
 * @property string|null $img_thiet_ke
 */
class Catelogies extends \app\models\NewsCatelogies
{
    CONST URL_CATELOGIES = '/cat/';
    
    /**
     * ---------virtual varible ---------
     */
    public $arr;
    
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true,
                'ensureUnique'=>true,
                //'uniqueValidator'=>[]
                // 'slugAttribute' => 'slug',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['pid', 'priority', 'level'], 'integer'],
            [['name', 'slug', 'seo_title'], 'string', 'max' => 200],
            [['seo_description', 'summary'], 'string'],
            [['type'], 'string', 'max' => 20],
            [['img_phoi_canh', 'img_cua', 'img_thiet_ke'], 'string', 'max' => 255],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'pid' => 'Pid',
            'priority' => 'Priority',
            'level' => 'Level',
            'summary' => 'Summary',
            'seo_title' => 'Seo Title',
            'seo_description' => 'Seo Description',
            'type' => 'Catelogies type',
            'img_phoi_canh' => 'Perspective Image',
            'img_cua' => 'Door Image',
            'img_thiet_ke' => 'Design Image',
        ];
    }
    
    /**
     * before save
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            
            if($this->pid == null){
                $this->pid = 0;
                $this->level = 1;
            } else{
                $this->level = $this::findOne($this->pid)->level + 1;
            }          
        }
        return true;
    }
    /**
     * get list index is id
     */
    /**
     *
     * @param unknown $arr
     * @param unknown $pid
     * @param unknown $level
     */
    public function getChildCatalog($arr, $pid, $level){
        $left = $level . '---';
        $listChildCatalogs = $this::find()->where(['pid'=>$pid])->all();
        if($listChildCatalogs != null){
            foreach ($listChildCatalogs as $j=>$catalog1){
                $this->arr[$catalog1->id] = $left . ' ' .$catalog1->name;
                $this->getChildCatalog($this->arr, $catalog1->id, $left);
            }
        }
    }
    /**
     *
     * @return unknown
     */
    public function getList($type=NULL)
    {
        if($type==NULL)
            $type = 'POST';
        
        $this->arr = array();
        //lay ds catalog parent
        $parentCatalogs = $this::find()->where('pid IS NULL OR pid = 0')->andFilterWhere([
            'type' => $type,
        ])->all();
        foreach ($parentCatalogs as $i=>$catalog){
            $this->arr[$catalog->id] = $catalog->name;
            $this->getChildCatalog($this->arr, $catalog->id, '');
        }
        return $this->arr;
    }
    
    /**
     * get list index is slug
     */
    /**
     *
     * @param unknown $arr
     * @param unknown $pid
     * @param unknown $level
     */
    public function getChildCatalogSlug($arr, $pid, $level){
        $left = $level . '---';
        $listChildCatalogs = $this::find()->where(['pid'=>$pid])->all();
        if($listChildCatalogs != null){
            foreach ($listChildCatalogs as $j=>$catalog1){
                $this->arr[$catalog1->slug] = $left . ' ' .$catalog1->name;
                $this->getChildCatalogSlug($this->arr, $catalog1->id, $left);
            }
        }
    }
    /**
     *
     * @return unknown
     */
    public function getListSlug($type=NULL)
    {
        if($type==NULL)
            $type = 'POST';
        
        $this->arr = array();
        //lay ds catalog parent
        $parentCatalogs = $this::find()->where('pid IS NULL OR pid = 0')->andFilterWhere([
            'type' => $type,
        ])->all();
        foreach ($parentCatalogs as $i=>$catalog){
            $this->arr[$catalog->slug] = $catalog->name;
            $this->getChildCatalogSlug($this->arr, $catalog->id, '');
        }
        return $this->arr;
    }
    
    /**
     * get cat link
     */
    public function getUrl(){
        if($this->type == 'POST'){
            return Yii::getAlias('@web') . $this::URL_CATELOGIES . $this->slug;
        } else if($this->type == 'PRODUCT'){
            return Yii::getAlias('@web/product-cat/') . $this->slug;
        }
    }
    
    /**
     * get new link edited
     */
    public function getUrlEdit(){
        return Yii::getAlias('@web/admin/catelogies/update?id=') . $this->id;
    }
    
    
    /**
     * get number post has this tag
     */
    public function getNumberNewsHasThisCatelog(){
        return News::find()->andFilterWhere(['like', 'catelogies', $this->slug])->count();
    }
    
    /**
     * seo
     */
    public function getSeoTitle(){
        return $this->seo_title == null ? $this->name : $this->seo_title;
    }
    
    public function getSeoDescription(){
        return $this->seo_description == null ? '' : $this->seo_description;
    }
}
