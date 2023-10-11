<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $site_name
 * @property string $site_copyright
 * @property string $text_homepage
 * @property string|null $site_title
 * @property string|null $site_description
 * @property string $site_address
 * @property string $site_phone
 * @property string $site_email
 * @property string $site_hotline
 * @property int|null $number_post_trending
 * @property int|null $number_post_catalog_home
 * @property int|null $number_post_per_page
 * @property int|null $number_post_like_in_news
 * @property int|null $number_post_in_menu
 * @property int|null $show_cover_after_summary
 */
class Settings extends \app\models\Settings
{
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['site_name', 'site_copyright', 'text_homepage', 'site_address', 'site_phone', 'site_email', 'site_hotline'], 'required'],
            [['site_copyright', 'site_description'], 'string'],
            [['number_post_trending', 'number_post_catalog_home', 'number_post_per_page', 'number_post_like_in_news', 'number_post_in_menu', 'show_cover_after_summary'], 'integer'],
            [['site_name', 'text_homepage', 'site_title'], 'string', 'max' => 200],
            [['site_address'], 'string', 'max' => 255],
            [['site_phone', 'site_email'], 'string', 'max' => 100],
            [['site_hotline'], 'string', 'max' => 20],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_name' => 'Site Name',
            'site_copyright' => 'Site Copyright',
            'text_homepage' => 'Text Homepage',
            'site_title' => 'Site Title',
            'site_description' => 'Site Description',
            'site_address' => 'Site Address',
            'site_phone' => 'Site Phone',
            'site_email' => 'Site Email',
            'site_hotline' => 'Site Hotline',
            'number_post_trending' => 'Number Post Trending',
            'number_post_catalog_home' => 'Number Post Catalog Home',
            'number_post_per_page' => 'Number Post Per Page',
            'number_post_like_in_news' => 'Number Post Like In News',
            'number_post_in_menu' => 'Number Post In Menu',
            'show_cover_after_summary' => 'Show Cover After Summary',
        ];
    }
    
    /**
     * format show hotline
     */
    public function showHotline(){
        if(strlen($this->site_hotline >= 10)){
            $kq = strrev($this->site_hotline);
            $kq = substr_replace($kq, '.', 3, 0);
            $kq = substr_replace($kq, '.', 7, 0);
            return strrev($kq);
        } else {
            return $this->site_hotline;
        }
    }
    /**
     * get page url by slug
     * @param unknown $slug
     * @return string|boolean
     */
    public function getUrl($slug){
        return Yii::getAlias('@web/page/'.$slug);
    }
}
