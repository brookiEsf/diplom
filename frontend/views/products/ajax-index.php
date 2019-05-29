<?php
/**
 * @var $products
 */

use yii\helpers\Html;

foreach ($products as $product):
    ?>
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-6">

                <?= Html::a('<img src="/images/noimage.png">', ['/product/view', 'id' => $product->id],
                    ['target' => "_blank"]) ?>

            </div>
            <div class="col-md-6">
                <?= date('Y-m-d', strtotime($product->date_created)); ?>
                <br>
                <?= $product->prod_name ?>
                <br>
                <?= $product->prod_definition ?>
                <p>
                    <b>PRICE:</b>
                    <?= $product->price ?> UAH
                </p>
                <p>
                    <?= Html::a('Buy', ['cart/add-product', 'id' => $product->id],
                        ['class' => 'btn btn-success']) ?>
                </p>
            </div>
        </div>
    </div>
<?php
endforeach;
?>
