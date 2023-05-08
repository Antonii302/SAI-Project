<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property int $product_category
 * @property int $unit_measurement
 *
 * @property PreliminaryInventory[] $preliminaryInventories
 * @property ProductBudgetDetail[] $productBudgetDetails
 * @property ProductCategory $productCategory
 * @property ProductTransaction[] $productTransactions
 * @property UnitMeasurement $unitMeasurement
 */
class Product extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['code', 'description', 'product_category', 'unit_measurement'], 'required'],
            [['product_category', 'unit_measurement'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 120],
            [['description'], 'unique'],
            [['product_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['product_category' => 'code']],
            [['unit_measurement'], 'exist', 'skipOnError' => true, 'targetClass' => UnitMeasurement::class, 'targetAttribute' => ['unit_measurement' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Identificador',
            'code' => 'Código',
            'description' => 'Descripción',
            'product_category' => 'Categoría del producto',
            'unit_measurement' => 'Unidad de medida',
        ];
    }

    public function getPreliminaryInventories()
    {
        return $this->hasMany(PreliminaryInventory::class, ['product' => 'id']);
    }

    public function getProductBudgetDetails()
    {
        return $this->hasMany(ProductBudgetDetail::class, ['product' => 'id']);
    }

    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['code' => 'product_category']);
    }

    public function getProductTransactions()
    {
        return $this->hasMany(ProductTransaction::class, ['product' => 'id']);
    }

    public function getUnitMeasurement()
    {
        return $this->hasOne(UnitMeasurement::class, ['id' => 'unit_measurement']);
    }
}
