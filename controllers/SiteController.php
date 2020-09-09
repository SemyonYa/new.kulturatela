<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Content;
use app\models\Faq;
use app\models\Prog;
use app\models\User;

class SiteController extends Controller
{

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
        $title = Content::findOne(1);

        $about = Content::findOne(2);
        $about_items = Content::findAll([3, 4, 5, 6, 7, 8]);
        $about_fit = Content::findOne(9);

        $adv = Content::findOne(10);
        $adv_items = Content::findAll([11,12,13,14,15,16,17,18,19,20]);

        $result = Content::findOne(21);

        $free = Content::findOne(22);

        $qs = Faq::find()->all();
        $progs = Prog::find()
            ->where(['hidden' => 0])
            ->all();

        return $this->render('index', compact(
            'title', 
            'about', 'about_items', 'about_fit',
            'adv', 'adv_items',
            'result',
            'free',
            'qs', 'progs'
        ));
    }

    public function actionLogin()
    {
        $errors = [];
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = User::findOne(['login' => $model->login]);
            if ($user) {
                if (Yii::$app->security->validatePassword($model->password, $user->password_hash) && !$user->blocked) {
                    $model->login($user);
                    if ($user->role_id === 1) {
                        return $this->redirect('/user');
                    } else {
                        return $this->redirect('/cab');
                    }
                    // return $this->goBack();
                } else {
                    $errors[] = 'Некорректные данные';
                }
            } else {
                $errors[] = 'Некорректные данные';
            }
        }

        $model->password = '';
        return $this->render('login', compact('model', 'errors'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
