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
 * @property ProductCategory $productCategory
 * @property UnitMeasurement $unitMeasurement
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'description', 'product_category', 'unit_measurement'], 'required'],
            [['product_category', 'unit_measurement'], 'integer'],
            [['code'], 'string', 'max' => 82],
            [['description'], 'string', 'max' => 120],
            [['description'], 'unique'],
            [['product_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['product_category' => 'code']],
            [['unit_measurement'], 'exist', 'skipOnError' => true, 'targetClass' => UnitMeasurement::class, 'targetAttribute' => ['unit_measurement' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'identificar',
            'code' => 'Código',
            'description' => 'Descripción',
            'product_category' => 'Categoría del producto',
            'unit_measurement' => 'Unidad de medida',
        ];
    }

    /**
     * Gets query for [[PreliminaryInventories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPreliminaryInventories()
    {
        return $this->hasMany(PreliminaryInventory::class, ['product' => 'id']);
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['code' => 'product_category']);
    }

    /**
     * Gets query for [[UnitMeasurement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitMeasurement()
    {
        return $this->hasOne(UnitMeasurement::class, ['id' => 'unit_measurement']);
    }
}
