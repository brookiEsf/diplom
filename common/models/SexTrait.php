<?php
/**
 * Created by PhpStorm.
 * User: Grudik
 * Date: 25.03.2019
 * Time: 20:44
 */

namespace common\models;

use Yii;

trait SexTrait
{
    public function getSexAll()
    {
        return Yii::$app->params['user.sex'];
    }

    public function getSexMale()
    {
        return Yii::$app->params['user.sex']['male'];
    }

    public function getSexFemale()
    {
        return Yii::$app->params['user.sex']['female'];
    }

    public function getSexUndefined()
    {
        return Yii::$app->params['user.sex']['undefined'];
    }

}