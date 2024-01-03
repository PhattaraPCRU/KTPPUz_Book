<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BsCustomer;

/**
 * BsCustomerSearch represents the model behind the search form of `frontend\models\BsCustomer`.
 */
class BsCustomerSearch extends BsCustomer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cus_login', 'cus_fullname', 'cus_address', 'cus_tel', 'cus_email', 'cus_password'], 'safe'],
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
        $query = BsCustomer::find();

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
        $query->andFilterWhere(['like', 'cus_login', $this->cus_login])
            ->andFilterWhere(['like', 'cus_fullname', $this->cus_fullname])
            ->andFilterWhere(['like', 'cus_address', $this->cus_address])
            ->andFilterWhere(['like', 'cus_tel', $this->cus_tel])
            ->andFilterWhere(['like', 'cus_email', $this->cus_email])
            ->andFilterWhere(['like', 'cus_password', $this->cus_password]);

        return $dataProvider;
    }
}
