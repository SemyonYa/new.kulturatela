<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Уроки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-lesson">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="admin-lesson-progs">
        <?php foreach ($progs as $prog) : ?>
            <div class="admin-lesson-progs-item">
                <h3>
                    <?= $prog->name ?>
                    <a href="/lesson/create?prog_id=<?= $prog->id ?>">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                    </a>
                </h3>
                <div class="admin-lesson-progs-item-lessons">
                    <ul>
                        <?php foreach ($prog->lessons as $lesson) : ?>
                            <a href="/lesson/update?id=<?= $lesson->id ?>">
                                <li class="admin-lesson-progs-item-lessons-item">
                                    <?= $lesson->name ?>
                                </li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>