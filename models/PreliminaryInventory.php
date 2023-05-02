<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preliminary_inventory".
 *
 * @property int $id
 * @property int $product
 * @property float $total_units
 * @property float $unit_price
 * @property string|null $date_expiry
 *
 * @property Product $product0
 */
class PreliminaryInventory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'preliminary_inventory';
    }

    public function rules()
    {
        return [
            [['product', 'total_units', 'unit_price'], 'required'],
            [['product'], 'integer'],
            [['total_units', 'unit_price'], 'number'],
            [['date_expiry'], 'safe'],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Identificador',
            'product' => 'Producto',
            'total_units' => 'Unidad total',
            'unit_price' => 'Precio c/u',
            'date_expiry' => 'Fecha de caducidad',
        ];
    }

    public function getProduct0()
    {
        return $this->hasOne(Product::class, ['id' => 'product']);
    }
}
