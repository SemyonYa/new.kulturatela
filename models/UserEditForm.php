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
class UserEditForm extends Model
{
    public $login;
    public $password;
    public $first_name;
    public $last_name;
    public $confirm_password;
    public $blocked;

    public function __construct($id)
    {
        $user = User::findOne($id);
        $this->login = $user->login;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->blocked = $user->blocked;
    }

    public function rules()
    {
        return [
            [['login', 'first_name'], 'required'],
            [['login', 'password', 'confirm_password', 'first_name', 'last_name'], 'string'],
            [['person_id', 'blocked'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'blocked' => 'Заблокировать',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение пароля',
        ];
    }

    public function save($id)
    {
        $user = User::findOne($id);
        $errors = [];
        if ($user_found = User::find()->where(['login' => $this->login])->andWhere(['!=', 'id', $id])->one()) {
            $errors[] = 'Пользователь с логином <code> ' . $user_found->login . ' </code> существует.';
        }

        if ($this->password !== $this->confirm_password) {
            $errors[] = 'Введенные пароли не совпадают.';
        }

        if (count($errors) === 0) {
            $user->login = $this->login;
            if ($this->password != '') {
                $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            }
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->blocked = $this->blocked;
            if ($user->save()) {
                return true;
            }
        }
        return $errors;
    }
}
