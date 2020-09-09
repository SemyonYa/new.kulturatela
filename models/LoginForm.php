<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $login;
    public $password;

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль'
        ];
    }

    public function login(IdentityInterface $user)
    {
        Yii::$app->user->login($user);
    }

}
