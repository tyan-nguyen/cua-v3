<?php

namespace app\modules\admin\models;

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
class ProductImages extends \app\models\ProductImages
{

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
                    
            }
            return true;
        }
    }
}
