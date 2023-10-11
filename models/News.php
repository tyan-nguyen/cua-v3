<?php

namespace app\models;

use Yii;

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
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catelogies'], 'required'],
            [['slug', 'summary', 'content', 'site_link', 'seo_description'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
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
}
