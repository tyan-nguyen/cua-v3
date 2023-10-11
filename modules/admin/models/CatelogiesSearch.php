<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Catelogies;

/**
 * CatelogiesSearch represents the model behind the search form about `app\modules\admin\models\Catelogies`.
 */
class CatelogiesSearch extends Catelogies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','pid', 'priority', 'level'], 'integer'],
            [['name', 'slug', 'type', 'summary', 'seo_title', 'seo_description'], 'safe'],
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
    public function search($params, $type=NULl)
    {
        $query = Catelogies::find();

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
            'pid' => $this->pid,
            'priority' => $this->priority,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'summary', $this->summary]);
        
        //show by type
        $query->andFilterWhere([
            'type' => $type,
        ]);
        
        return $dataProvider;
    }
}
