<?php

namespace common\models;

use common\models\Products;
use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%shopping_cart}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property array $description
 * @property int $created_at
 * @property int $updated_at
 * @property int $deleted_at
 *
 * @property ProductsShoppingCart[] $productsShoppingCarts
 * @property Products[] $products
 * @property User $user
 */
class ShoppingCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%shopping_cart}}';
    }


    public static function findLastCart()
    {
        $cart = ShoppingCart::find()->where(['is', 'deleted_at', null])->andWhere([
            '=',
            'user_id',
            Yii::$app->user->identity->getId()
        ])->andWhere(['=', 'status', 'created'])
            ->one();
        if ($cart === null) {
            return new static();
        } else {
            return $cart;
        }
    }

    public static function findLastUserCart()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['status'], 'string'],
            [['description'], 'safe'],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id']
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
            'user_id' => 'User ID',
            'status' => 'Status',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsShoppingCarts()
    {
        return $this->hasMany(ProductsShoppingCart::className(), ['shopping_cart_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function addProductToCart($product)
    {
        //todo ::it worked status-1
//        $flag = true;
//
//        foreach ($this->getProducts()->all() as $productsSingleItem) {
//            if ($productsSingleItem->id === $product->id) {
//                $flag = false;
//            }
//        }
//        if ($flag) {
//            $this->link('products', $product);
//            return true;
//
//        } else {
//            return false;
//        }

        //todo : end it worked status-1
        $junction = ProductsShoppingCart::find()->where(['products_id' => $product->id])->andWhere(['shopping_cart_id' => $this->id])->one();

//        if (isset($junction) && !$junction->isNewRecord) {
        if (isset($junction)) {
            $junction->quantity++;
        } else {
            $junction = new ProductsShoppingCart();
            $junction->setAttributes(['products_id' => $product->id, 'shopping_cart_id' => $this->id, 'quantity' => 1]);
        }

        $junction->save();
        return true;
        //print_r($product->productsShoppingCarts);
    }

    public function deleteProductFromCart($product)
    {
        $junction = ProductsShoppingCart::find()->where(['products_id' => $product->id])->andWhere(['shopping_cart_id' => $this->id])->one();

        if (isset($junction)) {
            $junction->delete();
            return true;
        }
        return false;
    }

    public function lessQuantityFromCart($product)
    {
        $junction = ProductsShoppingCart::find()->where(['products_id' => $product->id])->andWhere(['shopping_cart_id' => $this->id])->one();

        if(isset($junction) & $junction->quantity==1){
            $this->deleteProductFromCart($product);
            return true;
        }

        if (isset($junction)) {
            $junction->quantity--;
            return $junction->save();
//            return true;
        }
        return false;
    }

    public function moreQuantityToCart($product)
    {
        $junction = ProductsShoppingCart::find()->where(['products_id' => $product->id])->andWhere(['shopping_cart_id' => $this->id])->one();

        if (isset($junction)) {
            $junction->quantity++;
            return $junction->save();
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public
    function getProducts()
    {
        return $this->hasMany(Products::className(),
            ['id' => 'products_id'])->viaTable('{{%products_shopping_cart}}',
            ['shopping_cart_id' => 'id']);
    }
}
