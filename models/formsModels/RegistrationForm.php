<?php

namespace app\models\formsModels;

use app\models\User;
use BuySell\exceptions\FileSaveException;
use Yii;
use yii\base\Model;
use yii\db\Exception;

class RegistrationForm extends Model
{
    public $email;
    public $login;
    public $password;
    public $passwordRepeat;
    public $avatar;
    public $filePath;

    public function rules()
    {
        return [
            [['email', 'login', 'password', 'passwordRepeat'], 'required'],
            [['login', 'email'], 'string', 'max' => 320],
            [['login'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class, 'targetAttribute' => ['email' => 'email']],
            [['password', 'passwordRepeat'], 'string', 'min' => 6, 'max' => 64],
            [['passwordRepeat'], 'compare', 'compareAttribute' => 'password'],
            [['avatar'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'login' => 'Имя и Фамилия',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повтор пароля',
            'avatar' => 'Загрузите аватар...'
        ];
    }

    public function loadToUser()
    {
        if ($this->avatar && !$this->uploadFile()) {
            throw new FileSaveException('Не удалось сохранить файл');
        }
        $user = new User();
        $user->email = $this->email;
        $user->login = $this->login;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);

        return $user;
    }

    private function uploadFile(): bool
    {
        if ($this->avatar && $this->validate()) {
            $newName = uniqid('upload') . '.' . $this->avatar->getExtension();
            $this->avatar->saveAs('@webroot/uploads/' . $newName);

            $this->filePath = $newName;
            return true;
        }
        return false;
    }
}