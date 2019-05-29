<?php
//
//use yii\helpers\Html;
//use yii\widgets\DetailView;
//
///* @var $this yii\web\View */
///* @var $model common\models\Products */
//
//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
//?>
<!--<div class="products-view">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'prod_name',
//            'prod_definition',
//            'price',
//            'date_deleted',
//            'date_created',
//            'date_updated',
//            'status',
//            'seo_id',
//        ],
//    ]) ?>
<!---->
<!--</div>-->


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->prod_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <img src="/images/noimage.png">
        </div>
        <div class="col-md-6">
            <?= $model->prod_name ?>
            <?= $model->prod_definition ?>
            <?= $model->price ?>
            <?= Html::a('Buy', ['cart/add-product', 'id' => $model->id],
                ['class' => 'btn btn-success buy-product']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ajax-response">

        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('.btn.btn-success.buy-product').on('click', function (ev) {
            ev.preventDefault();
            $.get('/cart/add-product?id=<?=$model->id; ?>', function (msg) {
                // console.log(msg);
                if (msg.status === 'error') {
                    $('.ajax-response').html('Product can\'t be added to the cart');
                } else {
                    $('.ajax-response').html('Product added successfully');
                }
            });
        })
    }
</script>