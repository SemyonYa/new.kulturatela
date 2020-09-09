<?php

use yii\bootstrap\ActiveForm;

?>

<div class="cab-profile">
    <div class="cab-profile-wrap">
        <h3><?= $model->login ?> <a href="/site/logout"><img width="20" src="/web/img/log-out.svg" alt=""></a></h3>
        <hr>
        <div class="cab-profile-info">
            <h5>Активные курсы</h5>
            <div class="cab-profile-info-courses">
                <a href="/cab/lesson?id=<?= 4 ?>">
                    <div class="cab-profile-info-courses-item">Развитие гибкости <br> (активен до 25.08.2020)</div>
                </a>
                <a href="/cab/lesson?id=<?= 4 ?>">
                    <div class="cab-profile-info-courses-item">Fitness Intensive <br> (активен до 28.09.2020)</div>
                </a>
            </div>
        </div>
        <hr>
        <?php if (count($errors) > 0) : ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'first_name')->textInput() ?>
        <?= $form->field($model, 'last_name')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirm_password')->passwordInput() ?>

        <button type="submit" class="btn btn-primary">Сохранить</button>

        <?php ActiveForm::end(); ?>
    </div>

</div>