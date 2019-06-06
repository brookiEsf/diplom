<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;

foreach ($categories as $category) {
    $this->params['dropdown'][] = [
        'label' => $category->cat_name,
        'url' => ['#' => 'category-' . $category->id]
    ]; //categories/view?id=$category->id
}
?>
<!--<div class="categories-index">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!---->
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'parentId',
//            'cat_name',
//            'cat_description',
//            'date_deleted',
//            'date_created',
//            //'date_updated',
//            //'status',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
<!--</div>-->




<!--//    = [-->
<!--//    ['label' => 'Level 1 - Dropdown A', 'url' => '#'],-->
<!--//    '<li class="divider"></li>',-->
<!--//    '<li class="dropdown-header">Dropdown Header</li>',-->
<!--//    ['label' => 'Level 1 - Dropdown B', 'url' => '#'],-->
<!--//]-->

<h1>category/index</h1>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">



            Eget magna fermentum iaculis eu non diam phasellus vestibulum. Nec tincidunt praesent semper feugiat nibh
            sed pulvinar proin gravida. Ut eu sem integer vitae justo. Ut placerat orci nulla pellentesque dignissim. In
            nibh mauris cursus mattis molestie a. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt.
            Dictum sit amet justo donec enim diam vulputate ut. Imperdiet dui accumsan sit amet nulla facilisi morbi.
            Sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula ipsum. Eu turpis egestas pretium aenean.
            Convallis posuere morbi leo urna molestie at elementum eu. Leo urna molestie at elementum eu facilisis sed
            odio morbi. Et netus et malesuada fames. Sit amet tellus cras adipiscing enim eu turpis egestas pretium.
            Arcu dictum varius duis at consectetur.

            Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Sit amet volutpat consequat mauris nunc.
            Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Vestibulum sed arcu non odio. Massa
            tempor nec feugiat nisl pretium. Sed augue lacus viverra vitae congue eu. Dui nunc mattis enim ut tellus
            elementum sagittis vitae. Mattis aliquam faucibus purus in massa tempor nec feugiat nisl. Bibendum enim
            facilisis gravida neque. Sed cras ornare arcu dui. Ac turpis egestas integer eget aliquet. Sapien et ligula
            ullamcorper malesuada proin libero nunc consequat interdum. Mauris nunc congue nisi vitae suscipit tellus
            mauris a diam. Aliquet eget sit amet tellus cras adipiscing enim eu. Ultrices in iaculis nunc sed augue
            lacus viverra. Blandit massa enim nec dui nunc mattis. Nec sagittis aliquam malesuada bibendum arcu vitae
            elementum. Vestibulum morbi blandit cursus risus.

            Nunc sed augue lacus viverra vitae congue eu consequat. Fermentum iaculis eu non diam phasellus vestibulum
            lorem sed risus. Pharetra et ultrices neque ornare aenean euismod elementum. Sit amet consectetur adipiscing
            elit duis tristique sollicitudin. Amet consectetur adipiscing elit pellentesque habitant morbi. Quis
            imperdiet massa tincidunt nunc pulvinar sapien et. Enim ut sem viverra aliquet eget sit amet tellus cras.
            Nibh venenatis cras sed felis eget velit aliquet. Id interdum velit laoreet id donec ultrices tincidunt arcu
            non. Urna cursus eget nunc scelerisque viverra mauris in aliquam sem. Mattis ullamcorper velit sed
            ullamcorper morbi. Morbi tincidunt ornare massa eget egestas purus. Convallis tellus id interdum velit
            laoreet id. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Urna duis convallis convallis tellus
            id interdum. Magna fermentum iaculis eu non diam phasellus vestibulum lorem sed. Mauris commodo quis
            imperdiet massa tincidunt nunc pulvinar sapien. Cras semper auctor neque vitae tempus quam pellentesque nec
            nam. Facilisis mauris sit amet massa vitae tortor condimentum. Ac turpis egestas sed tempus urna et pharetra
            pharetra massa.

            Mi bibendum neque egestas congue quisque egestas. Vel pretium lectus quam id leo. Ullamcorper malesuada
            proin libero nunc consequat interdum varius sit. Lacinia at quis risus sed vulputate. Etiam non quam lacus
            suspendisse faucibus interdum posuere lorem. Lobortis feugiat vivamus at augue eget arcu dictum. Sed
            vulputate odio ut enim blandit. Nullam vehicula ipsum a arcu cursus vitae congue mauris. Morbi blandit
            cursus risus at ultrices mi tempus imperdiet. Quisque non tellus orci ac auctor.

            Dui ut ornare lectus sit amet est. In nulla posuere sollicitudin aliquam ultrices sagittis. Faucibus
            interdum posuere lorem ipsum dolor. Scelerisque varius morbi enim nunc faucibus a. Senectus et netus et
            malesuada. Dignissim convallis aenean et tortor at risus viverra adipiscing at. Scelerisque fermentum dui
            faucibus in ornare quam viverra orci sagittis. Donec massa sapien faucibus et molestie ac. Sit amet
            facilisis magna etiam tempor. Porttitor lacus luctus accumsan tortor posuere ac. Faucibus ornare suspendisse
            sed nisi. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Varius duis at
            consectetur lorem donec massa sapien faucibus et. Dictum fusce ut placerat orci nulla pellentesque
            dignissim. Duis at consectetur lorem donec massa. Eget magna fermentum iaculis eu non diam.


        </div>
    </div>
    <?php foreach ($categories as $category): ?>
        <div class="row" id="category-<?= $category->id ?>">
            <div class="col-md-12">
                <h2><?= $category->cat_name ?></h2>
            </div>
            <?php foreach ($category->categories as $childrenCategories): ?>
                <div class="col-md-4">
<!--                    <img src="/images/category1.png">-->
                    <?= \yii\helpers\Html::a($childrenCategories->cat_name,
                        ['category/view', 'id' => $childrenCategories->id]) ?>
<!--                    <a href=""> --><?//= $childrenCategories->cat_name; ?><!--</a>-->

                </div>

            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <div class="row">
        <div class="col-md-12">


        </div>

        <?php foreach ($categories as $category): ?>
        id="category-<?= $category->id ?>">
                <div class="col-md-6">
                   <h2><?= $category->cat_name ?></h2>
                </div>

                <?php foreach ($category->categories as $childrenCategories): ?>
                    <div class="col-md-4">
                        <!--                    <img src="/images/category1.png">-->

                        <?= \yii\helpers\Html::a($childrenCategories->cat_name,
                            ['category/view', 'id' => $childrenCategories->id]) ?>
                        <!--                    <a href=""> --><?//= $childrenCategories->cat_name; ?><!--</a>-->

                    </div>

                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>



            <div class="col-md-12">

           tesque
            dignissim. Duis at consectetur lorem donec massa. Eget magna fermentum iaculis eu non diam.

            Diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Amet nisl purus in mollis nunc sed id semper
            risus. Massa eget egestas purus viverra accumsan. Mi sit amet mauris commodo quis imperdiet. Magna etiam
            tempor orci eu lobortis elementum nibh. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris.
            Amet risus nullam eget felis eget nunc lobortis mattis aliquam. Consequat interdum varius sit amet mattis
            vulputate enim. Commodo nulla facilisi nullam vehicula. Vitae congue eu consequat ac felis donec. Eget magna
            fermentum iaculis eu non diam phasellus vestibulum lorem. Neque vitae tempus quam pellentesque nec nam
            aliquam sem et. Varius quam quisque id diam. Nunc aliquet bibendum enim facilisis gravida neque convallis a
            cras. Vel eros donec ac odio tempor orci dapibus ultrices in. Fermentum leo vel orci porta non pulvinar.
            Pellentesque elit ullamcorper dignissim cras. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper.
            Urna molestie at elementum eu facilisis sed odio. Ultrices gravida dictum fusce ut placerat orci nulla.

            Nulla pellentesque dignissim enim sit. Libero id faucibus nisl tincidunt eget nullam. Mattis enim ut tellus
            elementum sagittis vitae et leo. Et malesuada fames ac turpis egestas. Porttitor eget dolor morbi non arcu
            risus quis. Est velit egestas dui id ornare arcu odio. Elementum tempus egestas sed sed risus pretium quam
            vulputate dignissim. Tortor condimentum lacinia quis vel. Mi tempus imperdiet nulla malesuada pellentesque
            elit eget. Facilisi morbi tempus iaculis urna id volutpat lacus. Turpis nunc eget lorem dolor sed. Dapibus
            ultrices in iaculis nunc sed augue lacus viverra. Ullamcorper sit amet risus nullam eget felis eget nunc.
            Tincidunt dui ut ornare lectus. Aliquam vestibulum morbi blandit cursus risus at ultrices. Pretium lectus
            quam id leo.

        </div>
    </div>
</div>

