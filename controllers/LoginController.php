<?php

namespace app\controllers;

use app\models\formsModels\LoginForm;
use BuySell\AuthHandler;
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

    public function actionAuth()
    {
        $url = Yii::$app->authClientCollection->getClient("vkontakte")->buildAuthUrl();
        Yii::$app->getResponse()->redirect($url);
    }

    public function actionVk()
    {
        $code = Yii::$app->request->get('code');
        $authHandler = new AuthHandler($code);

        if ($authHandler->isAuthExist()) {
            Yii::$app->user->login($authHandler->getAuth()->user);

            echo 'Пользователь Существует';
        } else {
            $authHandler->saveAuthUser();
            Yii::$app->user->login($authHandler->getAuth()->user);

            echo 'Пользователь Создан';
        }

    }
}