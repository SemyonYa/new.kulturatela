<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class UserRegisterForm extends Model
{
    public $id;
    public $login;
    public $password;
    public $first_name;
    public $last_name;
    public $confirm_password;
    public $blocked;

    public function rules()
    {
        return [
            [['login', 'password', 'confirm_password', 'first_name'], 'required'],
            [['login', 'password', 'confirm_password', 'first_name', 'last_name'], 'string'],
            [['id'], 'integer'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'person_id' => 'Привязать к участнику конференции (необязательно)',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение пароля',
        ];
    }

    public function save()
    {
        $errors = [];
        if ($user_found = User::findOne(['login' => $this->login])) {
            $errors[] = 'Пользователь с логином <code>' . $user_found->login . '</code> существует.';
        }
        if ($this->password !== $this->confirm_password) {
            $errors[] = 'Введенные пароли не совпадают.';
        }

        if (count($errors) === 0) {
            $user = new User();
            $user->login = $this->login;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->role_id = 2;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->blocked = 0;
            if ($user->save()) {
                $this->id = $user->id;
                return true;
            } else {
                $errors[] = 'Не удалось сохранить';
            }
        }

        return $errors;
    }
}
