<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_prog".
 *
 * @property int $user_id
 * @property int $prog_id
 *
 * @property Prog $prog
 * @property User $user
 */
class UserProg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_prog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'prog_id'], 'required'],
            [['user_id', 'prog_id'], 'integer'],
            [['user_id', 'prog_id'], 'unique', 'targetAttribute' => ['user_id', 'prog_id']],
            [['prog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prog::className(), 'targetAttribute' => ['prog_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'prog_id' => 'Prog ID',
        ];
    }

    /**
     * Gets query for [[Prog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProg()
    {
        return $this->hasOne(Prog::className(), ['id' => 'prog_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
