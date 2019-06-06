<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

//$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-contacts">
    <h1><?= Html::encode($this->title) ?></h1>

    <div id="my-content">
        <div class="container">


            <div class="row">
                <div itemscope itemtype="http://schema.org/Organization" id="content" class="clearfix">

                    <div class="col-xs-12"><h1 class="section-title">Контакты</h1></div>

                    <div class="col-xs-12">

                        <div class="contacts-items-wrap flex justify-content-around align-items-top flex-wrap">

                            <div class="contacts-item">
                                <h2 class="contacts-item-title">Наша адреса:</h2>
                                <address itemprop="address" >
                                    Украина.<br />
                                    м. Луцьк,<br />
                                    вул. Євгена Сверстюка,1<br />
                                    БЦ "Фабрика"                       </address>
                            </div><!-- /.contacts-item-->

                            <div class="contacts-item">
                                <h2 class="contacts-item-title">Робочі години:</h2>
                                <div class="contacts-time-work">Інтернет - магазин:<br />
                                    24/7<br />
                                    Демо - зал: Пн - Пт<br />
                                    з 11:00 до 18:00</div>
                            </div><!-- /.contacts-item-->

                            <div class="contacts-item">
                                <h2 class="contacts-item-title">Телефони:</h2>
                                <ul class="contacts-phones">
                                    <li><a itemprop="telephone" content="+38(095) 000-0000" href="tel:+380950000000">+38(095) 520-0000</a></li><li><a itemprop="telephone" content="+38(095) 153-6866" href="tel:+380951536866">+38(095) 153-6866</a></li><li><a itemprop="telephone" content="+38(067) 710-2204" href="tel:+380677102204">+38(067) 710-2204</a></li><li><a itemprop="telephone" content="+38(067) 710-3032" href="tel:+380677103032">+38(067) 710-3032</a></li>                        </ul>
                            </div><!-- /.contacts-item-->

                            <div class="contacts-item">
                                <h2 class="contacts-item-title">E-mail:</h2>
                                <div class="contacts-email">
                                    <a itemprop="email" content="info@audio-beast.com.ua" href="mailto:info@audio-beast.com.ua">info@audio-beast.com.ua</a></div>
                            </div><!-- /.contacts-item-->
                        </div><!-- /.contacts-items-wrap-->

                    </div>

                </div>
            </div>
        </div>
       <div class="map"><br>
                                    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1282.7425264928436!2d36.23883763426048!3d49.983514918110714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a08b41b4a765%3A0xc4f6bd0bdb296f82!2z0KHQsNC70L7QvSAiSGlGaS3QpdCw0YDRjNC60L7QsiI!5e0!3m2!1sru!2sua!4v1524049170786" frameborder="0" style="border:0" allowfullscreen></iframe>-->
<!--        <script type="text/javascript">-->
<!--            window.onload = function () {-->
<!---->
<!--                // map-->
<!--                function initMap() {-->
<!---->
<!--                    var mapOptions = {-->
<!--                        zoom: 17,-->
<!--                        center: new google.maps.LatLng(49.983502, 36.239932),-->
<!--                        mapTypeControl: false,-->
<!--                        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]-->
<!--                    };-->
<!---->
<!--                    var mapElement = document.querySelector('.map');-->
<!--                    var map = new google.maps.Map(mapElement, mapOptions);-->
<!---->
<!--                    var marker = new google.maps.Marker({-->
<!--                        position: new google.maps.LatLng(49.983502, 36.239932),-->
<!--                        map: map,-->
<!--                        title: 'Hi-Fi',-->
<!--                        icon: '/catalog/view/theme/hifi/image/marker-icon.png'-->
<!--                    });-->
<!---->
<!--                    var infowindow = new google.maps.InfoWindow({-->
<!--                        content: '<p class="info-window-title">Салон "HiFi-Харьков"</p>' +-->
<!--                            '<p class="info-w-text">г.Харьков, </br>Гимназическая Набережная, 18</p>' +-->
<!--                            '<ul class="info-window-phones">' +-->
<!--                            '<li><a href="tel:+38(095) 520-3728">+38(095) 520-3728</a></li>' +-->
<!--                            '</ul>' +-->
<!--                            '<div class="info-view-link"><a target="_blank" href="https://maps.google.com/maps?ll=49.983642,36.239998&amp;z=18&amp;t=m&amp;hl=ru-RU&amp;gl=US&amp;mapclient=apiv3&amp;cid=14192739134323912578"><span>Показать на Google Картах</span></a></div>'-->
<!--                    });-->
<!---->
<!--                    marker.addListener('click', function() {-->
<!--                        infowindow.open(map, marker);-->
<!--                    });-->
<!--                }-->
<!---->
<!--                if(document.querySelector('.map')){-->
<!--                    initMap();-->
<!--                }-->
<!---->
<!--            };-->
<!--        </script>-->
<!--    </div>-->

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2524.4372009473504!2d25.327270915069!3d50.74892647369509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472599e59ac48be3%3A0x3c32822b21010a1e!2z0YPQu9C40YbQsCDQldCy0LPQtdC90LjRjyDQodCy0LXRgNGB0YLRjtC60LAsIDEsINCb0YPRhtC6LCDQktC-0LvRi9C90YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDQzMDAw!5e0!3m2!1sru!2sua!4v1559848735899!5m2!1sru!2sua" width=100% height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>


