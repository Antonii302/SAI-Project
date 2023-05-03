<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_detail".
 *
 * @property int $id
 * @property int $preliminary_inventory
 * @property float $remaining_units
 *
 * @property PreliminaryInventory $preliminaryInventory
 */
class InventoryDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preliminary_inventory', 'remaining_units'], 'required'],
            [['preliminary_inventory'], 'integer'],
            [['remaining_units'], 'number'],
            [['preliminary_inventory'], 'exist', 'skipOnError' => true, 'targetClass' => PreliminaryInventory::class, 'targetAttribute' => ['preliminary_inventory' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'preliminary_inventory' => 'Preliminary Inventory',
            'remaining_units' => 'Remaining Units',
        ];
    }

    /**
     * Gets query for [[PreliminaryInventory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPreliminaryInventory()
    {
        return $this->hasOne(PreliminaryInventory::class, ['id' => 'preliminary_inventory']);
    }
}
