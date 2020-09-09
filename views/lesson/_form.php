<?php

use app\models\Prog;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lesson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'ordering')->textInput() ?>

    <?= $form->field($model, 'is_sec')->checkbox() ?>

    <?= $form->field($model, 'is_pre')->checkbox() ?>

    <?= $form->field($model, 'prog_id')->dropDownList(
        Prog::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'...']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $('#lesson-video').click((e) => {
        selectVideo(e);
    });
</script>