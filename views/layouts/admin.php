<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="wrap-admin">
        <div class="admin-header">
            <div class="logo"></div>
            <div class="user">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= Yii::$app->user->identity->login ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="/user">Пользователи</a></li>
                        <li><a href="/content">Контент</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/cab">В кабинет</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/site/logout">Выход</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wrap-admin-inner">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Панель администрирования', 'url' => '/user'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

<div class="modal fade" id="ktModal" tabindex="-1" role="dialog" aria-labelledby="ktModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" id="ktModalLabel">Modal title</h4>
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>