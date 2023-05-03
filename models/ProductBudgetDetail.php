<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_budget_detail".
 *
 * @property int $id
 * @property int $annual_inventory_budget
 * @property int $departmental_division
 * @property int $product
 * @property float $requested_units
 *
 * @property AnnualInventoryBudget $annualInventoryBudget
 * @property DepartmentalDivision $departmentalDivision
 * @property Product $product0
 */
class ProductBudgetDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_budget_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['annual_inventory_budget', 'departmental_division', 'product', 'requested_units'], 'required'],
            [['annual_inventory_budget', 'departmental_division', 'product'], 'integer'],
            [['requested_units'], 'number'],
            [['annual_inventory_budget'], 'exist', 'skipOnError' => true, 'targetClass' => AnnualInventoryBudget::class, 'targetAttribute' => ['annual_inventory_budget' => 'id']],
            [['departmental_division'], 'exist', 'skipOnError' => true, 'targetClass' => DepartmentalDivision::class, 'targetAttribute' => ['departmental_division' => 'code']],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Identificador',
            'annual_inventory_budget' => 'Presupuesto de inventario anual',
            'departmental_division' => 'División departamental',
            'product' => 'Producto',
            'requested_units' => 'Unidades solicitadas',
        ];
    }

    /**
     * Gets query for [[AnnualInventoryBudget]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnnualInventoryBudget()
    {
        return $this->hasOne(AnnualInventoryBudget::class, ['id' => 'annual_inventory_budget']);
    }

    /**
     * Gets query for [[DepartmentalDivision]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentalDivision()
    {
        return $this->hasOne(DepartmentalDivision::class, ['code' => 'departmental_division']);
    }

    /**
     * Gets query for [[Product0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(Product::class, ['id' => 'product']);
    }
}
