<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admin-user">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="admin-access-list">
        <?php foreach ($progs as $prog) : ?>
            <!-- <div class="admin-access-list-item"> -->
            <label for="prog-access-<?= $prog->id ?>">
                <input id="prog-access-<?= $prog->id ?>" data-user-id="<?= $model->id ?>" data-prog-id="<?= $prog->id ?>" type="checkbox" onchange="toggleProgAccess(this)">
                <?= $prog->name ?>
            </label>
            <!-- </div> -->
        <?php endforeach; ?>
    </div>