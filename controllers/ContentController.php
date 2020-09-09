<?php

namespace app\controllers;

use app\models\User;

class ContentController extends AdminController
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
    
}
