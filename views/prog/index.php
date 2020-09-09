<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Программы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-prog">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать программу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="admin-prog-list">
        <?php foreach ($progs as $prog) : ?>
            <a href="/prog/view?id=<?= $prog->id ?>">
                <div class="admin-prog-list-item">
                    <?= $prog->name ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>


</div>