<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit_measurement".
 *
 * @property int $id
 * @property string $unit
 *
 * @property Product[] $products
 */
class UnitMeasurement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit_measurement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit'], 'required'],
            [['unit'], 'string', 'max' => 22],
            [['unit'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit' => 'Unit',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['unit_measurement' => 'id']);
    }
}
