<?php

namespace app\modules\warehouse\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventory;

class InventorySearch extends Inventory
{
    public $product_description;
    public $classification_description;
    public $measurement_description;

    public function rules()
    {
        return [
            [['id', 'product_id', 'classification_id', 'measurement_id'], 'integer'],
            [['product_description', 'classification_description', 'measurement_description'], 'safe'],
            [['current_quantity'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Inventory::find();
        
        $query->joinWith('product');
        $query->joinWith('classification');
        $query->joinWith('measurement');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['product_description'] = [
            'asc' => ['product.description' => SORT_ASC],
            'desc' => ['product.description' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['measurement_description'] = [
            'asc' => ['unit_measurement.description' => SORT_ASC],
            'desc' => ['unit_measurement.description' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'current_quantity' => $this->current_quantity,
            'classification_id' => $this->classification_id,
            'measurement_id' => $this->measurement_id,
        ]);

        $query->andFilterWhere(['like', 'product.description', $this->product_description]);
        $query->andFilterWhere(['like', 'inventory_classification.description', $this->classification_description]);
        $query->andFilterWhere(['like', 'unit_measurement.description', $this->measurement_description]);

        return $dataProvider;
    }
}
