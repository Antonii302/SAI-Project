<?php

namespace app\modules\warehouse_activity\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PreliminaryInventory;

/**
 * PreliminaryInventorySearch represents the model behind the search form of `app\models\PreliminaryInventory`.
 */
class PreliminaryInventorySearch extends PreliminaryInventory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product'], 'integer'],
            [['total_units', 'unit_price'], 'number'],
            [['date_expiry'], 'safe'],
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
        $query = PreliminaryInventory::find();

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
            'total_units' => $this->total_units,
            'unit_price' => $this->unit_price,
            'date_expiry' => $this->date_expiry,
        ]);

        return $dataProvider;
    }
}
