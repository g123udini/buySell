<?php

namespace app\controllers;

use app\models\formsModels\LoginForm;
use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
    public function actionIndex() {
        $loginForm = new LoginForm();

        if (Yii::$app->request->isPost) {
            $loginForm->load(Yii::$app->request->post());
            if ($loginForm->validate()) {
                $user = $loginForm->getUser();
                Yii::$app->user->login($user);

                echo 'User logged';
            }
        }

        return $this->render('login', ['model' => $loginForm]);
    }
}