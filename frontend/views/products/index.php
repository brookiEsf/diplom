<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $products array of Obj
 * @var $page
 * @var $limits
 * @var $elementQuantities
 */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="container">
        <div class="row products-row">
            <?php

            foreach ($products as $product):
                ?>
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6">

                            <?= Html::a('<img src="/images/noimage.png">', ['/products/view', 'id' => $product->id],
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
        </div>


        <div class="row">
            <?php
               echo $this->render('paginator', compact('limits', 'page', 'baseUrl'))
            ?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php if ($page !== 1): ?>
<!--                    --><?//= Html::a('Previous', ['product/index', 'prev'],
//                        ['class' => 'btn btn-success previous-page']) ?>

                <?php endif; ?>
            </div>

            <div class="col-md-6">


<!--                    --><?//= Html::a('Next', ['cart/add-product', 'id' => $product->id],
//                        ['class' => 'btn btn-success next-page']) ?>
            </div>
        </div>
    </div>
<!--    <script>-->
<!--        window.onload = function () {-->
<!--            var page = -->
    <!-- <?//=$page - 1?>; -->
    <!--            $('.btn.btn-success.previous-page').on('click', function (ev) {-->
    <!--                $.get('/product/index?page=' + page + '&elementQuantities=<?//=$elementQuantities?>//', function (msg) {-->
    <!--                    console.log(page);-->
    <!--                    page--;-->
    <!--                    $('.products-row').html(msg);-->
    <!--                    if (page === 1) $('.btn.btn-success.previous-page').css('display', 'none');-->
    <!--               });-->
    <!--            })-->
    <!--        }-->
        <!--   </script> -->
    </div>
