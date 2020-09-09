<?php

namespace app\controllers;

use app\models\UserEditForm;
use Yii;
use yii\web\Controller;


class CabController extends InController
{
    public $layout = 'cab';

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProgram($id)
    {
        return $this->render('program');
    }

    public function actionLesson($id)
    {
        return $this->render('lesson');
    }

    public function actionArticles()
    {
        return $this->render('articles');
    }

    public function actionArticle($id)
    {
        return $this->render('article', compact('id'));
    }

    public function actionProfile()
    {
        $id = Yii::$app->user->identity->id;
        $errors = [];
        $model = new UserEditForm($id);

        if ($model->load(Yii::$app->request->post())) {
            $result = $model->save($id);
            if ($result === true) {
                return $this->redirect(['index']);
            } else {
                $errors = $result;
            }
        }

        $model->password = '';
        $model->confirm_password = '';
        return $this->render('profile', compact('model', 'errors'));
    }
}
