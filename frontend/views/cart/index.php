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
<h1>Корзина товарів</h1>
<?php
if (Yii::$app->session->hasFlash('info')) {
    echo Yii::$app->session->getFlash('info');
}
?>
<!--<p>-->
<!--    --><?php //if (!empty($cart->products)): ?>
<!--        --><?php
//        $sum = 0;
//        foreach ($cart->products as $product) {
//
//            echo $product->id . ' ' . $product->prod_name . ' ' . ($product->price) . '  ' . $quantity[$product->id] . ' ' . ($product->price * $quantity[$product->id]) . '<br><hr>';
//            $sum += $product->price * $quantity[$product->id];
//        }
//
//        ?>
<!--        in totale --><?//= $sum; ?><!-- UAH<br>-->
<!--        --><?//= Html::a('Buy', ['cart/confirm-cart'],
//            ['class' => 'btn btn-success']);
//        ?>
<!--    --><?php //endif; ?>
<!--</p>-->

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Артикул</th>
        <th scope="col">Назва продукту</th>
        <th scope="col">Ціна</th>
        <th scope="col">Кількість</th>
    </tr>
    </thead>
    <tbody>

    <tr>
<?php if (!empty($cart->products)): ?>
    <?php
    $sum = 0;
    $i=0;
    foreach ($cart->products as $product) :?>
        <th scope="row"><?=$i?></th>
        <td><?=$product->id?></td>
        <td><?= $product->prod_name?></td>
        <td><?= $product->price?></td>
        <td><?= $quantity[$product->id]?></td>
        <td><?= \yii\helpers\Html::a('Видалити',['cart/del-product','id'=> $product->id])?></td>
        <td><?= \yii\helpers\Html::a('<button>+</button>',['cart/more-product','id'=> $product->id])?></td>
        <td><?= \yii\helpers\Html::a('<button>-</button>',['cart/less-product','id'=> $product->id])?></td>

    </tr>
    <?php
        $i++;
        $sum += $product->price * $quantity[$product->id];

    endforeach; ?>
    </tbody>
    </table>

    <b>Сума до сплати:</b> <?= $sum; ?> UAH <br><br>

    <?= Html::a('Оформити замовлення', ['cart/confirm-cart'],
        ['class' => 'btn btn-success']);
    ?>

<? endif;?>