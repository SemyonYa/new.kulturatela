<?php

namespace app\controllers;

use app\models\Prog;
use Yii;
use app\models\User;
use app\models\UserEditForm;
use app\models\UserProg;
use app\models\UserRegisterForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends AdminController
{

    public $layout = 'admin';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $users = User::find()->all();

        return $this->render('index', compact('users'));
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $progs = Prog::find()
            ->where(['hidden' => 0])
            ->all();
        return $this->render('view', compact('model', 'progs'));
    }

    public function actionToggleProgAccess($user_id, $prog_id) {
        $prog = UserProg::findOne(['user_id' => $user_id, 'prog_id' => $prog_id]);
        $added = null;
        if ($prog) {
            $prog->delete();
            $added = false;
        } else {
            $prog = new UserProg();
            $prog->user_id = $user_id;
            $prog->prog_id = $prog_id;
            $prog->save();
            $added = true;
        }
        return Json::encode($added);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $errors = [];
        $model = new UserRegisterForm();

        if ($model->load(Yii::$app->request->post())) {
            $result = $model->save();
            if ($result === true) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $errors = $result;
            }
        }
        $model->password = '';
        $model->confirm_password = '';
        return $this->render('create', compact('model', 'errors'));
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $errors = [];
        $model = new UserEditForm($id);

        if ($model->load(Yii::$app->request->post())) {
            $result = $model->save($id);
            if ($result === true) {
                return $this->redirect(['view', 'id' => $id]);
            } else {
                $errors = $result;
            }
        }

        $model->password = '';
        $model->confirm_password = '';
        return $this->render('update', compact('model', 'errors'));
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
