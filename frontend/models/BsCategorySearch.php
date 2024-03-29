<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BsCategory;

/**
 * BsCategorySearch represents the model behind the search form of `frontend\models\BsCategory`.
 */
class BsCategorySearch extends BsCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_id'], 'integer'],
            [['cate_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params)
    {
        $query = BsCategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cate_id' => $this->cate_id,
        ]);

        $query->andFilterWhere(['like', 'cate_name', $this->cate_name]);

        return $dataProvider;
    }
}
