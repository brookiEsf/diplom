<?php

namespace common\models;

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
 * @property ProductsCategories[] $productsCategories
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
            [['cat_name'], 'required'],
            [['date_deleted', 'date_created', 'date_updated'], 'safe'],
            [['status'], 'integer'],
            [['cat_name'], 'string', 'max' => 95],
            [['cat_name'], 'unique'],
            [
                ['parentId'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Categories::className(),
                'targetAttribute' => ['parentId' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentId' => 'Parent ID',
            'cat_name' => 'Cat Name',
       //     'cat_description' => 'Cat Description',
            'date_deleted' => 'Date Deleted',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parentId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['parentId' => 'id']);
    }
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
        return $this->hasMany(ProductsCategories::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('products_category', ['category_id' => 'id']);
    }
}
