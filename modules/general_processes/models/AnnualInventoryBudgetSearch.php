<?php

namespace app\modules\general_processes\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AnnualInventoryBudget;

class AnnualInventoryBudgetSearch extends AnnualInventoryBudget
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_editable'], 'integer'],
            [['start_period', 'end_period'], 'safe'],
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
        $query = AnnualInventoryBudget::find();

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
            'start_period' => $this->start_period,
            'end_period' => $this->end_period,
            'is_editable' => $this->is_editable,
        ]);

        return $dataProvider;
    }
}
