<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class AdminController extends Controller
{
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/login');
        }
        $user_role = Yii::$app->user->identity->role_id;
        if ($user_role != 1) {
            throw new ForbiddenHttpException('Недостаточно прав для выполнения операции');
        }
        return parent::beforeAction($action);
    }
}
