<?php

namespace app\models;

use Yii;

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
 * @property string|null $type
 * @property string|null $img_phoi_canh
 * @property string|null $img_cua
 * @property string|null $img_thiet_ke
 */
class NewsCatelogies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_catelogies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['pid', 'priority', 'level'], 'integer'],
            [['summary', 'seo_description'], 'string'],
            [['name', 'slug', 'seo_title'], 'string', 'max' => 200],
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
            'type' => 'Type',
            'img_phoi_canh' => 'Img Phoi Canh',
            'img_cua' => 'Img Cua',
            'img_thiet_ke' => 'Img Thiet Ke',
        ];
    }
}
