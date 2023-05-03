<?php

namespace app\modules\warehouse_activity\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductTransaction;

/**
 * ProductoTransactionSearch represents the model behind the search form of `app\models\ProductTransaction`.
 */
class ProductoTransactionSearch extends ProductTransaction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product', 'departmental_division'], 'integer'],
            [['requested_units'], 'number'],
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
        $query = ProductTransaction::find();

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
            'id' => $this->id,
            'product' => $this->product,
            'departmental_division' => $this->departmental_division,
            'requested_units' => $this->requested_units,
        ]);

        return $dataProvider;
    }
}
