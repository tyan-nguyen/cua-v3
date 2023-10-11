<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "tag_list".
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $date_created
 * @property string|null $seo_title
 * @property string|null $seo_description
 */
class TagList extends \app\models\TagList
{
    CONST URL_TAGS = '/tag/';
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true,
                'ensureUnique'=>true,
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
            [['date_created'], 'safe'],
            [['seo_description'], 'string'],
            [['name', 'slug', 'seo_title'], 'string', 'max' => 200],
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
            'date_created' => 'Date Created',
            'seo_title' => 'Seo Title',
            'seo_description' => 'Seo Description',
        ];
    }
    
    /**
     * before save
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                $this->date_created = date('Y-m-d H:i:s');                    
            }
            return true;
        }
    }
    
    /**
     * get list
     */
    public function getList()
    {
        return ArrayHelper::map($this::find()->all(), 'slug', 'name');
    }
    
    /**
     * get list
     */
    public function getListName()
    {
        return ArrayHelper::map($this::find()->all(), 'name', 'name');
    }
    
    /**
     * get number post has this tag
     */
    public function getNumberNewsHasThisTag(){
        return News::find()->andFilterWhere(['like', 'tags', $this->slug])->count();
    }
    
    /**
     * get tag link
     */
    public function getUrl(){
        return Yii::getAlias('@web') . $this::URL_TAGS . $this->slug;
    }
    
    /**
     * get tag link edited
     */
    public function getUrlEdit(){
        return Yii::getAlias('@web/admin/tag-list/update?id=') . $this->id;
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
