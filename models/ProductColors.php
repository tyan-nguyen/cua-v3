<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_colors".
 *
 * @property int $id
 * @property int $id_product
 * @property string $color
 * @property string|null $thumbnail
 * @property string|null $image
 * @property string|null $date_created
 * @property int|null $user_created
 */
class ProductColors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_colors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'color'], 'required'],
            [['id_product', 'user_created'], 'integer'],
            [['date_created'], 'safe'],
            [['color'], 'string', 'max' => 20],
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
            'color' => 'Color',
            'thumbnail' => 'Thumbnail',
            'image' => 'Image',
            'date_created' => 'Date Created',
            'user_created' => 'User Created',
        ];
    }
}
