<?php

namespace app\modules\admin\models;

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
class ProductColors extends \app\models\ProductColors
{
    /*
     * list color
     */
    public function getColorList(){
        return [
            'GRAY' => 'GRAY',
            'WHITE' => 'WHITE',
            'WOOD' => 'WOOD'
        ];
    }
    
    /**
     * get list color view
     */
    public function getColorLabel(){
        if($this->color == 'GRAY')
            return ['name'=>'GRAY', 'icon'=>Yii::getAlias('@web/img/color_gray.png')];
            else if($this->color == 'WHITE')
                return ['name'=>'WHITE', 'icon'=>Yii::getAlias('@web/img/color_white.png')];
                else if($this->color == 'WOOD')
                    return ['name'=>'WOOD', 'icon'=>Yii::getAlias('@web/img/color_wood.png')];
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
