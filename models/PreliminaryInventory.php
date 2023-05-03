<?php

namespace app\models;

use Yii;

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
            'total_units' => 'Unidades totales',
            'unit_price' => 'Precio por unidad',
            'date_expiry' => 'Fecha de caducidad',
        ];
    }

    public function getProduct0()
    {
        return $this->hasOne(Product::class, ['id' => 'product']);
    }
}
