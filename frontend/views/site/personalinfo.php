<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\debug\models\timeline\DataProvider;

$this->title = 'PersonalInfo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-personalinfo">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">
            <p><b>Дані облікового запису:</b>
            </p>
            <br>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value'=>$model->username])->label('Логін') ?>

            <?= $form->field($model, 'email')->textInput(['value'=>$model->email])->label('Ел. пошта') ?>

<!--            --><?//= $form->field($model, 'password')->textInput(['']) ?>

            <?= $form->field($model, 'firstName')->textInput(['value'=>$model->firstName])->label('Ім\'я')  ?>

            <?= $form->field($model, 'lastName')->textInput(['value'=>$model->lastName])->label('Прізвище')  ?>

            <?= $form->field($model, 'poBatkovi')->textInput(['value'=>$model->poBatkovi])->label('По-батькові') ?>

            <?= $form->field($model, 'phone')->textInput(['value'=>$model->phone])->label('Ноер телефону')  ?>

            <?= $form->field($model, 'gender')->textInput(['value'=>$model->gender])->label('Стать')?>

            <?= $form->field($model, 'age')->textInput(['value'=>$model->age])->label('Вік')  ?>

            <?= $form->field($model, 'birthday')->textInput(['value'=>$model->birthday])->label('Дата народження')  ?>

            <?= $form->field($model, 'city')->textInput(['value'=>$model->city])->label('Адреса')  ?>

            <div class="form-group">
                <?= Html::submitButton('Оновити дані', ['class' => 'btn btn-primary', 'name' => 'savePD-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

<!--    <code>--><?//= __FILE__ ?><!--</code>-->
</div>