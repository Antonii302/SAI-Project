<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_transaction".
 *
 * @property int $id
 * @property int $product
 * @property int $departmental_division
 * @property float $requested_units
 *
 * @property DepartmentalDivision $departmentalDivision
 * @property Product $product0
 */
class ProductTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product', 'departmental_division', 'requested_units'], 'required'],
            [['product', 'departmental_division'], 'integer'],
            [['requested_units'], 'number'],
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
            'product' => 'Producto',
            'departmental_division' => 'División departamental',
            'requested_units' => 'Unidades solicitadas',
        ];
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
