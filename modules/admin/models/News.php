<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $imgcover
 * @property string $catelogies
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $summary
 * @property string|null $content
 * @property string|null $date_created
 * @property int|null $just_for_this_site
 * @property string|null $site_id
 * @property string|null $site_link
 * @property string|null $date_updated
 * @property int|null $user_created
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $post_status
 * @property string|null $tags
 * @property string|null $site_keywords
 * @property int|null $is_static
 * @property int|null $is_product
 */
class News extends \app\models\News
{
    //catalog for create, update
    public $catalog;
    public $taglist;
    
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
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
            [['catelogies', 'title'], 'required'],
            [['slug', 'summary', 'content', 'site_link', 'seo_description'], 'string'],
            [['date_created', 'date_updated', 'catalog', 'taglist'], 'safe'],
            [['just_for_this_site', 'user_created', 'is_static', 'is_product'], 'integer'],
            [['code', 'imgcover', 'catelogies', 'site_id', 'seo_title', 'tags', 'site_keywords'], 'string', 'max' => 200],
            [['title'], 'string', 'max' => 300],
            [['post_status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'imgcover' => 'Imgcover',
            'catelogies' => 'Catelogies',
            'title' => 'Title',
            'slug' => 'Slug',
            'summary' => 'Summary',
            'content' => 'Content',
            'date_created' => 'Date Created',
            'just_for_this_site' => 'Just For This Site',
            'site_id' => 'Site ID',
            'site_link' => 'Site Link',
            'date_updated' => 'Date Updated',
            'user_created' => 'User Created',
            'seo_title' => 'Seo Title',
            'seo_description' => 'Seo Description',
            'post_status' => 'Post Status',
            'tags' => 'Tags',
            'site_keywords' => 'Site Keywords',
            'is_static' => 'Is Static',
            'is_product' => 'Is Product',
        ];
    }
    
    /**
     * before save
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                if(!Yii::$app->user->isGuest)
                    $this->user_created = Yii::$app->user->id;
                $this->date_created = date('Y-m-d H:i:s');
                if($this->is_static == null){
                    $this->is_static = 0;
                }
                if($this->is_product == null){
                    $this->is_product = 0;
                }
                    
            } else {
                $this->date_updated = date('Y-m-d H:i:s');
            }
            return true;
        }
    }
    
    /**
     * delete file
     */
    public function beforeDelete()
    {
        $this->deleteDir(Yii::getAlias('@webroot/images/posts/'). $this->code);
        $this->deleteDir(Yii::getAlias('@webroot/images/thumbs/'). $this->code);  
        parent::beforeDelete();
        return true;
    }
    
    /**
     * dell folder not used
     * @return mixed
     */
    public static function deleteDir($dirPath) {
        if(file_exists($dirPath)){
            if (! is_dir($dirPath)) {
                throw new \InvalidArgumentException("$dirPath must be a directory");
            }
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::deleteDir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dirPath);
        }
    }
    
    /*
     * post status
     */
    public function getPostStatus(){
        return [
            'DRAFT' => 'Bản nháp',
            'CRAWL' => 'Tạm ẩn',
            'PUBLISH' => 'Công bố'
        ];
    }
    
    /**
     * get post status view
     */
    public function getPostStatusLabel(){
        if($this->post_status == 'DRAFT')
            return 'Bản nháp';
                else if($this->post_status == 'CRAWL')
                    return 'Tạm ẩn';
                    else if($this->post_status == 'PUBLISH')
                        return 'Công bố';
    }
    
    /**
     * view catelogies in gridview
     */
    public function getPostStatusView(){
        if($this->post_status == 'DRAFT')
            $type = 'default';
            else if($this->post_status == 'CRAWL')
                $type = 'warning';
                else if($this->post_status == 'PUBLISH')
                    $type = 'primary';
        
       return '<span class="label label-' . $type . '">' . $this->getPostStatusLabel() . '</span> ';
    }
    
    
    /**
     * get new link publish
     */
    public function getUrl(){
        return Yii::getAlias('@web/post/') . $this->slug;
    }
    
    /**
     * get new link edited
     */
    public function getUrlEdit(){
        return Yii::getAlias('@web/admin/news/update?id=') . $this->id;
    }
    
    /**
     * get catelogies
     */
    public function getCatelogiesList(){
        $result = array();
        $list = explode(';', $this->catelogies);
        foreach ($list as $item){
            $cat = Catelogies::find()->where(['slug'=>$item])->one();
            if($cat != null)
                $result[$item] = $cat->name;
        }
        return $result;
    }
    
    
    /**
     * view catelogies in gridview
     */
    public function getCatelogiesView(){
        $result = '';
        $list = explode(';', $this->catelogies);
        foreach ($list as $item){
            $cat = Catelogies::find()->where(['slug'=>$item])->one();
            if($cat != null)
                $result .= '<span class="label label-primary">' . $cat->name . '</span> ';
        }
        return $result;
    }
    
    /**
     * get list tags list by name
     */
    public function getListTagName(){
        $idTags = array();
        if($this->tags != null){
            $tagSlugs = explode(';', $this->tags);
            foreach ($tagSlugs as $indexTag=>$tagSlug){
                $tagModel = TagList::find()->where(['slug'=>$tagSlug])->one();
                if($tagModel != null)
                    $idTags[] = $tagModel->name;
            }
        }
        return $idTags;
    }
    
    /**
     * get list tags list by name
     */
    public function getListTags(){
        $idTags = array();
        if($this->tags != null){
            $tagSlugs = explode(';', $this->tags);
            foreach ($tagSlugs as $indexTag=>$tagSlug){
                $tagModel = TagList::find()->where(['slug'=>$tagSlug])->one();
                if($tagModel != null)
                    $idTags[$tagSlug] = $tagModel->name;
            }
        }
        return $idTags;
    }
    
    /**
     * get summarry
     */
    public function getSummary150(){
        if($this->summary != '' && strlen($this->summary) > 150){
            $pos=strpos($this->summary, ' ', 150);
            return substr($this->summary,0,$pos ) . '...';
        } else {
            return $this->summary;
        }
    }
    
    /**
     * get summarry
     */
    public function getSummary300(){
        if($this->summary != '' && strlen($this->summary) > 300){
            $pos=strpos($this->summary, ' ', 300);
            return substr($this->summary,0,$pos ) . '...'; 
        } else {
            return $this->summary;
        }
    }
    
    /**
     * get summarry
     */
    public function getSummary500(){
        if($this->summary != '' && strlen($this->summary) > 500){
            $pos=strpos($this->summary, ' ', 500);
            return substr($this->summary,0,$pos ) . '...';
        } else {
            return $this->summary;
        }
    }
    
    /**
     * get user created
     */
    public function getUserCreated(){
        if($this->user_created == null){
            return 'Auto';
        } else {
            return User::findOne($this->user_created)->username;
        }
    }
    
    /**
     * check dir empty
     */
    public function is_dir_empty($dir) {
        if (!is_readable($dir)) return null;
        return (count(scandir($dir)) == 2);
    }
    
    /**
     * get images
     */
   /*  public function getImageCover(){
        $picFolder = Yii::getAlias('@webroot/images/posts/'. $this->code . '/');
        $picWebFolder = Yii::getAlias('@web/images/posts/'. $this->code . '/');
        $picDefault = Yii::getAlias('@web/images/posts/default.jpg');
        //find fist image in folder, if not found get default image
        $firstFile = 'default.jpg';
        if(file_exists($picFolder)){
            if(!$this->is_dir_empty($picFolder)){
                $firstFile = scandir($picFolder)[2];
                return $picWebFolder . $firstFile;
            } else {
                return $picDefault;
            }
        } else {
            return $picDefault;
        }
        
    } */
    
    /**
     * get images
     */
   /*  public function getImageCover1(){
        $picFolder = Yii::getAlias('@webroot/images/posts/'. $this->code . '/');
        $picWebFolder = Yii::getAlias('@web/images/posts/'. $this->code . '/');
        $picDefault = Yii::getAlias('@web/images/default.jpg');
        //find fist image in folder, if not found get default image
        $firstFile = 'default.jpg';
        if(file_exists($picFolder)){
            if(!$this->is_dir_empty($picFolder)){
              
                $firstFile = scandir($picFolder)[2];
                return $picWebFolder . $firstFile;
            } else {
                return $picDefault;
            }
        } else {
            return $picDefault;
        }      
        
    } */
    
    public function getCover(){
        if($this->imgcover != null)
            return $this->imgcover;
        else 
            return $this->getImageCover();
    }
    
    public function getImageCover(){
        /* $picFolder = Yii::getAlias('@webroot/images/posts/'. $this->code . '/');
        $fi = new \FilesystemIterator($picFolder);
        return iterator_count($fi); */
        $picFolder = Yii::getAlias('@webroot/images/posts/'. $this->code . '/');
        $picWebFolder = Yii::getAlias('@web/images/posts/'. $this->code . '/');
        $picDefault = Yii::getAlias('@web/images/default.png');
        //find fist image in folder, if not found get default image
        $firstFile = 'default.png';
        if(file_exists($picFolder)){
            if(!$this->is_dir_empty($picFolder)){
                //count file in folder
                $fi = new \FilesystemIterator($picFolder);
                $numFile = iterator_count($fi);
                $files = glob($picFolder . '/*.{jpg,png,gif}', GLOB_BRACE);
                $bestImageVal = null;
                $bestFile = null;
                $bestName =  null;
                foreach($files as $file) {
                    //do your work here
                    list($width, $height, $type, $attr) = getimagesize($file);
                   // if($width - $height >=0){
                        if($bestImageVal == null){
                            $bestImageVal = $width - $height;
                            $bestFile = $file;
                            $bestName = basename($file);
                        }
                        else if( ($width - $height) > $bestImageVal){
                             $bestImageVal = $width - $height;
                             $bestFile = $file;
                             $bestName = basename($file);
                        }
                            
                   // }
                    
                }
                if($bestFile != null && $bestImageVal >= 0)
                    return $picWebFolder . $bestName;
                else
                    return $picDefault;
                
               // $firstFile = scandir($picFolder)[2];
               # return $picWebFolder . $firstFile;
            } else {
                return $picDefault;
            }
        } else {
            return $picDefault;
        } 
    }
    
    /**
     * seo
     */
    public function getSeoTitle(){
        return $this->seo_title == null ? $this->title : $this->seo_title;
    }
    
    public function getSeoDescription(){
        return $this->seo_description == null ? $this->summary : $this->seo_description;
    }
    
}
