<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $cat_name
 * @property string $cat_description
 * @property string $date_deleted
 * @property string $date_created
 * @property string $date_updated
 * @property int $status
 *
 * @property CategoriesImages[] $categoriesImages
 * @property Images[] $images
 * @property ProductsCategory[] $productsCategories
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name', 'cat_description'], 'required'],
            [['date_deleted', 'date_created', 'date_updated'], 'safe'],
            [['status'], 'integer'],
            [['cat_name', 'cat_description'], 'string', 'max' => 95],
            [['cat_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Cat Name',
            'cat_description' => 'Cat Description',
            'date_deleted' => 'Date Deleted',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getCategoriesImages()
//    {
//        return $this->hasMany(CategoriesImages::className(), ['categories_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getImages()
//    {
//        return $this->hasMany(Images::className(), ['id' => 'images_id'])->viaTable('categories_images', ['categories_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsCategories()
    {
        return $this->hasMany(ProductsCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('products_category', ['category_id' => 'id']);
    }
}
