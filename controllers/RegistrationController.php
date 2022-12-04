<?php

namespace app\controllers;

use app\models\formsModels\RegistrationForm;
use BuySell\exceptions\ModelSaveException;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class RegistrationController extends Controller
{
    public function actionIndex() {
        $registrationForm = new RegistrationForm();

        if (Yii::$app->request->getIsPost()) {
            $registrationForm->load(Yii::$app->request->post());
            $registrationForm->avatar = UploadedFile::getInstance($registrationForm, 'file');
            if ($registrationForm->validate()) {

                if (!$registrationForm->loadToUser()->save()) {

                    throw new ModelSaveException('Сохранить пользователя не удалось');
                }

                echo 'ALL OK';
            }
        }

        return $this->render('registration', ['model' => $registrationForm]);
    }

}