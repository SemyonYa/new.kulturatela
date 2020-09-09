<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password_hash
 * @property string $access_token
 * @property string $refresh_token
 * @property int $role_id
 * @property int $person_id
 * @property int $blocked
 *
 * @property Role $role
 * @property Person $person
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password_hash', 'role_id', 'first_name'], 'required'],
            [['password_hash', 'last_name'], 'string'],
            [['role_id', 'blocked'], 'integer'],
            [['login'], 'string', 'max' => 50],
            [['login'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password_hash' => 'Password Hash',
            'role_id' => 'Role ID',
            'person_id' => 'Person ID',
            'blocked' => 'Blocked',
        ];
    }


    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public function getUserProgs()
    {
        return $this->hasMany(UserProg::className(), ['user_id' => 'id']);
    }

    public function getProgs()
    {
        return $this->hasMany(Prog::className(), ['id' => 'prog_id'])->viaTable('user_prog', ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return '';
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
