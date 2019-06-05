<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        ['label' => 'PersonalInfo', 'url' => ['/site/personalinfo']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">

<!--    <footer id="my-footer" class="site-footer">-->
<!--        <div class="container">-->
<!---->
<!--            <div class="row">-->
<!--                <div class="col-xs-12">-->
<!---->
<!--                    <div class="footer-content flex justify-content-between flex-wrap">-->
<!--                        <div class="footer-col footer-col-main">-->
<!--                            <a href="/" class="logo logo-footer">-->
<!--                                <img src="https://hifi-profi.com.ua/image/cache/catalog/_HIFI_200418_B-105x55.png" alt="Hi-Fi" class="img-responsove">-->
<!--                            </a>-->
<!--                            <!--                        --><!--                            <h1 class="sub-logo-text">--><!--</h1>-->-->
<!--                            <!--                        --><!--                            <div class="sub-logo-text">--><!--</div>-->-->
<!--                            <!--                        -->                        <div class="footer-address">Украина.-->
<!--                                г.Харьков,-->
<!--                                Гимназическая наб.,18-->
<!--                                в магазине "Panasonic"</div>-->
<!--                        </div><!-- /.footer-col -->-->
<!---->
<!--                        <div class="footer-col footer-col-list">-->
<!--                            <div class="footer-nav">-->
<!--                                <div class="footer-title">Информация</div>-->
<!--                                <ul class="footer-nav-list">-->
<!--                                    <li><a href="https://hifi-profi.com.ua/about_us">О компании</a></li>-->
<!--                                    <!--                                <li><a href="--><!--">--><!--</a></li>-->-->
<!--                                    <li><a href="https://hifi-profi.com.ua/contact-us/">Контакты</a></li>-->
<!--                                    <li><a href="https://hifi-profi.com.ua/novosti/">Новости</a></li>-->
<!--                                    <li><a href="https://hifi-profi.com.ua/brands/">Производители</a></li>-->
<!--                                    <li><a href="https://hifi-profi.com.ua/sitemap/">Карта сайта</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div><!-- /.footer-col -->-->
<!---->
<!--                        <div class="footer-col footer-col-time-work">-->
<!--                            <div class="footer-title">Время работы:</div>-->
<!--                            <ul class="footer-time-work-list">-->
<!--                                <li>Интернет - магазин:-->
<!--                                </li><li>24/7-->
<!--                                </li><li>Демо - зал: Пн - Пт-->
<!--                                </li><li>с 11:00 до 18:00</li>                            </ul>-->
<!--                            <ul class="social flex">-->
<!--                                <li><a rel="nofollow" href="https://www.facebook.com/HiFi.Kharkov/"><i class="icon-facebook"></i></a></li>-->
<!--                                <li><a rel="nofollow" href="https://plus.google.com/113104054104216123777"><i class="icon-google"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div><!-- /.footer-col -->-->
<!---->
<!--                        <div class="footer-col footer-col-contacts">-->
<!--                            <div class="footer-title">Наши контакты:</div>-->
<!--                            <ul class="footer-phones-list">-->
<!--                                <li><a href="tel:0800201724">(0800) 201-724</a></li><li><span style="display:none;">80800201724</span><span style="font-size: 14px;">(бесплатно со всех номеров)</span></li><li><a href="tel:+380677102204">+38(067) 710-2204</a></li><li><a href="tel:+380677103032">+38(067) 710-3032</a></li>                        </ul>-->
<!--                            <a rel="nofollow" href="mailto:info@hifi-profi.com.ua" class="footer-mail">info@hifi-profi.com.ua</a>-->
<!--                        </div><!-- /.footer-col -->-->
<!---->
<!--                        <div class="footer-col footer-col-additional">-->
<!--                            <div class="footer-title">Подписка на рассылку:</div>-->
<!--                            <div class="footer-subscribe-text">Полезные обзоры, статьи, новинки, акции и спецпредложения</div>-->
<!--                            <div class="footer-subscribe-wrap">-->
<!--                                <form id="footer_subscribe" class="submit-form subscribe-form">-->
<!--                                    <input id="footer_subscribe_email" name="email" type="text" placeholder="E-mail">-->
<!--                                    <button class="submit-btn"><i class="icon-chevron-thin-right"></i></button>-->
<!--                                </form>-->
<!--                                <div style="display: none" id="subscribe_alert"><i class="fa fa-exclamation-circle"></i></div>-->
<!--                            </div>-->
<!--                            <a href="#callback-popup" class="callback to-popup"><span>Обратный звонок</span></a>-->
<!--                            <div class="dev flex align-items-center">-->
<!--                                <a rel="nofollow" target="_blank" href="https://art-marks.net/">-->
<!--                                    <span>Разработка и дизайн:</span>-->
<!--                                    <img src="/catalog/view/theme/hifi/image/artmarks-logo-white.png" alt="ArtMarks" class="img-responsive">-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div><!-- /.footer-col -->-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--                <div class="col-xs-12"><p class="copyright">copy right 2018</p></div>-->
<!--                <!-- <div class="col-xs-12"><div class="ad" style="padding: 14px 15px 10px; margin-top: 10px; text-align: center; font-size: 1.1rem; border-top: 1px solid #00614b; line-height: 1.35;">Интернет магазин работает в тестовом режиме, все консультации принимаются по телефону.</div></div> -->-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--        <script type="text/javascript">-->
<!--            $('#footer_subscribe').on('submit', function () {-->
<!--                $.ajax({-->
<!--                    url: 'https://hifi-profi.com.ua/index.php?route=account/subscribe',-->
<!--                    method: 'POST',-->
<!--                    data: {-->
<!--                        'email': $(this).find('#footer_subscribe_email').val(),-->
<!--                    },-->
<!--                    success: function (data) {-->
<!--                        var answer = JSON.parse(data);-->
<!--                        var status = answer['status'];-->
<!--                        if (status == 0) {-->
<!--                            status = 'alert alert-danger';-->
<!--                        } else if (status == 1) {-->
<!--                            status = 'alert alert-success';-->
<!--                        }-->
<!--                        //block layout-->
<!--                        var alert = $('#subscribe_alert');-->
<!--                        alert.find('i').removeClass().addClass(status).text(answer['answer']);-->
<!--                        $('#subscribe_alert').fadeIn();-->
<!--                        setTimeout(function () {-->
<!--                            $('#subscribe_alert').fadeOut()-->
<!--                        }, 2000);-->
<!--                    }-->
<!--                });-->
<!--                event.preventDefault();-->
<!--            });-->
<!--        </script>-->
<!--    </footer>-->

    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
