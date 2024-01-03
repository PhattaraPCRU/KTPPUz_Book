<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BsBook;

/**
 * BsBookSearch represents the model behind the search form of `frontend\models\BsBook`.
 */
class BsBookSearch extends BsBook
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_isbn', 'book_title', 'book_writer', 'book_publishing', 'book_note', 'book_date', 'book_pic'], 'safe'],
            [['book_pages', 'book_total', 'cate_id'], 'integer'],
            [['book_cost', 'book_price'], 'number'],
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
        $query = BsBook::find();
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
            'book_pages' => $this->book_pages,
            'book_cost' => $this->book_cost,
            'book_price' => $this->book_price,
            'book_total' => $this->book_total,
            // 'book_date' => $this->book_date,
            'cate_id' => $this->cate_id,
        ]);

        $query->andFilterWhere(['like', 'book_isbn', $this->book_isbn])
            ->andFilterWhere(['like', 'book_title', $this->book_title])
            ->andFilterWhere(['like', 'book_writer', $this->book_writer])
            ->andFilterWhere(['like', 'book_publishing', $this->book_publishing])
            ->andFilterWhere(['like', 'book_note', $this->book_note])
            ->andFilterWhere(['like', 'book_pic', $this->book_pic]);
            if(!empty($this->book_date) && strpos($this->book_date, '-') !== false){
                list($start_date, $end_date) = explode(' - ', $this->book_date);
                $query->andFilterWhere(['between', "date_format(book_date, '%Y-%m-%d')", $start_date, $end_date]);
            }
            
        return $dataProvider;
    }
}
