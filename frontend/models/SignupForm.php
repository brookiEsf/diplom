<?php
namespace frontend\models;

use common\models\SexTrait;
use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstName;
    public $lastName;
    public $poBatkovi;
    public $gender;
    public $age;
    public $birthday;
    public $phone;
    public $city;

    use SexTrait;
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

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['firstName', 'required'],
            ['firstName', 'string', 'min' => 2, 'max' => 255],

            ['lastName', 'required'],
            ['lastName', 'string', 'min' => 2, 'max' => 255],

            ['poBatkovi', 'required'],
            ['poBatkovi', 'string'],

            ['gender', 'in', 'range' => $this->getSexAll()],

            ['age', 'required'],
            ['age', 'integer'],

            ['birthday', 'date', 'format' => 'php:Y-m-d'],

            ['phone', 'required'],
            ['phone', 'string', 'min' => 11, 'max' => 15],

            ['city', 'required'],
            ['city', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->firstName = $this->firstName;
        $user->lastName = $this->lastName;
        $user->poBatkovi = $this->poBatkovi;
        $user->gender = $this->gender;
        $user->age = $this->age;
        $user->phone = $this->phone;
        $user->birthday = $this->birthday;
        $user->city = $this->city;
        
        return $user->save() ? $user : null;
    }

    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
