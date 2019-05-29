<?php
/* @var $this yii\web\View
 * @var $cart
 * @var $quantity
 */

use yii\helpers\Html;

?>
<br>
<br>
<br>
<h1>SHOPING CART HERE</h1>
<?php
if (Yii::$app->session->hasFlash('info')) {
    echo Yii::$app->session->getFlash('info');
}
?>
<p>
    <?php if (!empty($cart->products)): ?>
        <?php
        $sum = 0;
        foreach ($cart->products as $product) {

            echo $product->id . ' ' . $product->prod_name . ' ' . ($product->price) . '  ' . $quantity[$product->id] . ' ' . ($product->price * $quantity[$product->id]) . '<br><hr>';
            $sum += $product->price * $quantity[$product->id];
        }

        ?>
        in totale <?= $sum; ?> UAH<br>
        <?= Html::a('Buy', ['cart/confirm-cart'],
            ['class' => 'btn btn-success']);
        ?>
    <?php endif; ?>
</p>
