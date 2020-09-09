<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prog".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property int $hidden
 *
 * @property Lesson[] $lessons
 */
class Prog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'hidden'], 'required'],
            [['description'], 'string'],
            [['price', 'hidden'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'description' => 'Описание',
            'price' => 'Цена',
            'hidden' => 'Скрыть',
        ];
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['prog_id' => 'id']);
    }
}
