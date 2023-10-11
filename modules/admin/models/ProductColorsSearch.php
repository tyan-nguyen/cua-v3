<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\ProductColors;

/**
 * ProductColorsSearch represents the model behind the search form about `app\modules\admin\models\ProductColors`.
 */
class ProductColorsSearch extends ProductColors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_product', 'user_created'], 'integer'],
            [['color', 'thumbnail', 'image', 'date_created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $productid=NULL)
    {
        $query = ProductColors::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_product' => $this->id_product,
            'date_created' => $this->date_created,
            'user_created' => $this->user_created,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'image', $this->image]);
        
        if($productid != NULL){
            $query->andFilterWhere([
                'id_product' => $productid,
            ]);
        }

        return $dataProvider;
    }
}
