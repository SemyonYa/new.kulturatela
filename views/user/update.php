<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Редактирование: ' . $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (count($errors) > 0) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'confirm_password')->passwordInput() ?>


    <button type="submit" class="btn btn-primary">Сохранить</button>

    <?php ActiveForm::end(); ?>

</div>