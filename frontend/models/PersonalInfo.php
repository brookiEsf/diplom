<?php
/**
 * Created by PhpStorm.
 * User: olgakvatkovska
 * Date: 2019-06-04
 * Time: 15:22
 */

namespace frontend\models;

use yii\base\Model;

/**
 * PersonalInfo
 */

class PersonalInfo extends Model
{
    public $username;
    public $email;
    public $firstName;
    public $lastName;
    public $poBatkovi;
    public $gender;
    public $age;
    public $birthday;
    public $phone;
    public $city;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['firstName', 'required'],
            ['firstName', 'string', 'min' => 2, 'max' => 255],

            ['lastName', 'required'],
            ['lastName', 'string', 'min' => 2, 'max' => 255],

            ['poBatkovi', 'required'],
            ['poBatkovi', 'string'],

            ['gender', 'required'],
 //         ['gender', 'integer'],

            ['age', 'required'],
            ['age', 'integer'],

            ['birthday', 'required'],
            ['birthday', 'date'],

            ['phone', 'required'],
            ['phone', 'string', 'min' => 15, 'max' => 15],

            ['city', 'required'],
            ['city', 'string'],
        ];

}

    public function getPersonalInfo()
    {
        if (!$this->validate()) {
            return null;
        }

        $personal_info = new PersonalInfo();
        $personal_info->username = $this->username;
        $personal_info->email = $this->email;
        $personal_info->firstName = $this->firstName;
        $personal_info->lastName = $this->lastName;
        $personal_info->poBatkovi = $this->poBatkovi;
        $personal_info->gender = $this->gender;
        $personal_info->age = $this->age;
        $personal_info->birthday = $this->birthday;
        $personal_info->city = $this->city;

        return $personal_info->save() ? $personal_info : null;
    }}