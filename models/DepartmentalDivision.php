<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departmental_division".
 *
 * @property int $code
 * @property string $name
 * @property int $is_active
 *
 * @property ProductTransaction[] $productTransactions
 */
class DepartmentalDivision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departmental_division';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 142],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Código',
            'name' => 'Nombre',
            'is_active' => '¿Está activo?',
        ];
    }

    /**
     * Gets query for [[ProductTransactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTransactions()
    {
        return $this->hasMany(ProductTransaction::class, ['departmental_division' => 'code']);
    }
}
