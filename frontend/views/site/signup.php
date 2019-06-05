<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логін')?>

                <?= $form->field($model, 'email')->label('Ел. пошта') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                <?= $form->field($model, 'firstName')->textInput()->label('Ім\'я') ?>

                <?= $form->field($model, 'lastName')->textInput()->label('Прізвище') ?>

                <?= $form->field($model, 'poBatkovi')->textInput()->label('По-батькові') ?>

                <?= $form->field($model, 'phone')->textInput()->label('Ноер телефону') ?>

                <?= $form->field($model, 'gender')->dropDownList($model->getSexAll())->label('Стать')?>

                <?= $form->field($model, 'age')->textInput()->label('Вік') ?>

                <?= $form->field($model, 'birthday')->input(date('YYYY-MM-DD'))->label('Дата народження') ?>

                <?= $form->field($model, 'city')->textInput()->label('Адреса') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
