<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prog */

$this->title = 'Новая программа';
$this->params['breadcrumbs'][] = ['label' => 'Программы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
