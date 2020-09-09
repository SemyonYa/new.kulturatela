<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $description
 * @property int $img
 * @property string|null $svg
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'img'], 'integer'],
            [['subtitle', 'description'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['svg'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'description' => 'Description',
            'img' => 'Img',
            'svg' => 'Svg',
        ];
    }
}
