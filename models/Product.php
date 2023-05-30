<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $description
 * @property int $id_product_category
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
            [['description', 'id_product_category'], 'required'],
            [['id_product_category'], 'integer'],
            [['description'], 'string', 'max' => 128],
            [['description'], 'unique'],
            [['id_product_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['id_product_category' => 'id']],
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
            'id_product_category' => 'Id Product Category',
        ];
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'id_product_category']);
    }
}
