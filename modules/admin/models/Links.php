<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property int $open_new_tab
 * @property string $link
 */
class Links extends \app\models\Links
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'open_new_tab', 'priority'], 'required'],
            [['open_new_tab', 'priority'], 'integer'],
            [['name', 'link'], 'string', 'max' => 200],
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
            'link' => 'Link',
            'open_new_tab' => 'Open New Tab',
            'priority' => 'Priority',
        ];
    }
}
