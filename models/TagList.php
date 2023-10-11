<?php

namespace app\models;

use Yii;

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
class TagList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag_list';
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
}
