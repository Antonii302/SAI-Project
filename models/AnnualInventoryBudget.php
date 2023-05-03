<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "annual_inventory_budget".
 *
 * @property int $id
 * @property string $start_period
 * @property string $end_period
 * @property int $is_editable
 *
 * @property ProductBudgetDetail[] $productBudgetDetails
 */
class AnnualInventoryBudget extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'annual_inventory_budget';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_period', 'end_period', 'is_editable'], 'required'],
            [['start_period', 'end_period'], 'safe'],
            [['is_editable'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_period' => 'Inicio del período',
            'end_period' => 'Fin del período',
            'is_editable' => '¿Edición permitida?',
        ];
    }

    /**
     * Gets query for [[ProductBudgetDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductBudgetDetails()
    {
        return $this->hasMany(ProductBudgetDetail::class, ['annual_inventory_budget' => 'id']);
    }
}
