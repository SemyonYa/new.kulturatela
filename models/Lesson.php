<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $video
 * @property int $ordering
 * @property int $is_sec
 * @property int $is_pre
 * @property int $prog_id
 *
 * @property Prog $prog
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'video', 'ordering', 'is_sec', 'is_pre', 'prog_id'], 'required'],
            [['ordering', 'is_sec', 'is_pre', 'prog_id'], 'integer'],
            [['name', 'video'], 'string', 'max' => 200],
            [['prog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prog::className(), 'targetAttribute' => ['prog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'video' => 'Файл видео на сервере',
            'ordering' => 'Сортировка',
            'is_sec' => 'Это Техника безопасности',
            'is_pre' => 'Это Разминка',
            'prog_id' => 'Урок относится к программе',
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
}
