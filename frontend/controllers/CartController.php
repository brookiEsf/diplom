<?php

namespace frontend\controllers;

use common\models\Products;
use common\models\ProductsShoppingCart;
use common\models\ShoppingCart;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use Yii;
use yii\web\Request;
use yii\web\Response;

class CartController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add-product' => ['GET'],
                ],
            ],
        ];
    }

//    public function actionTest()
//    {
//        $cart = ShoppingCart::findLastCart();
//        $this->actionAddProduct('10');
//        echo '<pre>';
//        print_r($cart->productsShoppingCarts);
//        echo '</pre>';
//    }


    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error',
                'this action can be done only by registered user,please log in or ' . Html::a('register',
                    ['site/signup']));
            return Yii::$app->response->redirect(['site/login']);
        }

        $cart = ShoppingCart::findLastCart();
        if (empty($cart->products)) {
            Yii::$app->session->setFlash('info', 'Cart is empty');
        }
        $quantity = [];
        foreach ($cart->products as $product) {
            $quantity[$product->id] = ProductsShoppingCart::find()->where([
                '=',
                'products_id',
                $product->id
            ])->andWhere([
                '=',
                'shopping_cart_id',
                $cart->id
            ])->one()->quantity;

        }
        return $this->render('index', ['cart' => $cart, 'quantity' => $quantity]);
    }

    public function actionAddProduct($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error',
                'this action can be done only by registered user,please log in or ' . Html::a('register',
                    ['site/signup']));
            return Yii::$app->response->redirect(['site/login']);
        }

        $product = Products::findOne($id);

        $shoppingCart = ShoppingCart::findLastCart();
        if ($shoppingCart->isNewRecord) {
            $shoppingCart->user_id = Yii::$app->user->getId();
            $shoppingCart->save();
        }
        if ($product && $shoppingCart->addProductToCart($product)) {
            //todo:: make this work for success status either
//            return $this->asJson(['status' => 'success']); //if we need to get data with help AJAX.

            Yii::$app->session->setFlash('success', 'thanks, product successfully added to your card');


            return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));


        }
        if (Yii::$app->request->isAjax) {
            return $this->asJson(['status' => 'error']);
        } else {
            Yii::$app->session->setFlash('error', 'sorry, we can\'t add this product to your cart');
            return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
        }

    }

    public function actionConfirmCart()
    {
        $shopingCart = ShoppingCart::findLastCart();
        if ($shopingCart->isNewRecord) {

            return $this->render('error');
        } else {
            $shopingCart->status = 'approved';
            if ($shopingCart->save()) {
                return $this->render('success', ['id' => $shopingCart->id]);
            }
        }
    }

}
