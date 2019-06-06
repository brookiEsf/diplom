<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $alt
 * @property string $title
 *
 * @property CategoriesImages[] $categoriesImages
 * @property Categories[] $categories
 * @property NewsImages[] $newsImages
 * @property News[] $news
 * @property ProductsImages[] $productsImages
 * @property Products[] $products
 */
class images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path', 'alt', 'title'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['path', 'alt', 'title'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['path'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Path',
            'alt' => 'Alt',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesImages()
    {
        return $this->hasMany(CategoriesImages::className(), ['images_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'categories_id'])->viaTable('categories_images', ['images_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getNewsImages()
//    {
//        return $this->hasMany(NewsImages::className(), ['images_id' => 'id']);
//    }
//
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getNews()
//    {
//        return $this->hasMany(News::className(), ['id' => 'news_id'])->viaTable('news_images', ['images_id' => 'id']);
//    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsImages()
    {
        return $this->hasMany(ProductsImages::className(), ['images_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('products_images', ['images_id' => 'id']);
    }
}
