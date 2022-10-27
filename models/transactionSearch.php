<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\transaction;

/**
 * transactionSearch represents the model behind the search form of `app\models\transaction`.
 */
class transactionSearch extends transaction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_id', 'customer_id', 'bill_amount'], 'integer'],
            [['customer_name'], 'safe'],
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
        $query = transaction::find();

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
            'transaction_id' => $this->transaction_id,
            'customer_id' => $this->customer_id,
            'bill_amount' => $this->bill_amount,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name]);

        return $dataProvider;
    }
}
