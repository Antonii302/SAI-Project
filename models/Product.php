<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $description
 * @property int $product_category_id
 *
 * @property ProductCategory $productCategory
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
            [['description', 'product_category_id'], 'required'],
            [['product_category_id'], 'integer'],
            [['description'], 'string', 'max' => 128],
            [['description'], 'unique'],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'product_category_id' => 'Product Category ID',
        ];
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'product_category_id']);
    }
}
