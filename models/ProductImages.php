<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_images".
 *
 * @property int $id
 * @property int $id_product
 * @property string|null $thumbnail
 * @property string|null $image
 * @property string|null $date_created
 * @property int|null $user_created
 */
class ProductImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product'], 'required'],
            [['id_product', 'user_created'], 'integer'],
            [['date_created'], 'safe'],
            [['thumbnail', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'thumbnail' => 'Thumbnail',
            'image' => 'Image',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }
}
