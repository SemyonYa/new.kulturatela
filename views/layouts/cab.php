<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

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
<?php 
    $is_video = Yii::$app->request->pathInfo === 'cab' || strpos(Yii::$app->request->pathInfo, 'cab/prog') === 0 || strpos(Yii::$app->request->pathInfo, 'cab/lesson') === 0;
    $is_articles = strpos(Yii::$app->request->pathInfo, 'cab/article') === 0;
    $is_profile = Yii::$app->request->pathInfo === 'cab/profile';
?>

<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="cab-header">
            <div class="cab-header-item <?= $is_video ? 'active' : '' ?>" onclick="window.location.href='/cab'">
                Видео
            </div>
            <div class="cab-header-item <?= $is_articles ? 'active' : '' ?>" onclick="window.location.href='/cab/articles'">
                Статьи
            </div>
            <div class="cab-header-item <?= $is_profile ? 'active' : '' ?>" onclick="window.location.href='/cab/profile'">
                Профиль
            </div>

            <!-- <div class="logo"></div>
            <a href="/cab">
                <div class="video-link"></div>
            </a>
            <div class="user">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php // echo Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->login 
                        ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="/cab/articles">Статьи</a></li>
                        <li><a href="/cab/profile">Профиль</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/site/logout">Выход</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
        <?= $content ?>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>