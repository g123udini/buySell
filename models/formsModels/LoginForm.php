<?php

namespace app\models\formsModels;

use app\models\User;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    private $_user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'email'],
            [['email'], 'exist', 'targetClass' => User::class, 'targetAttribute' => ['email' => 'email']],
            [['password'], 'validatePassword']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Почта',
            'password' => 'Пароль'
        ];
    }

    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['email' => $this->email]);
        }

        return $this->_user;
    }

    /**
     * Сравнивает пароль введенный пользователем с хэшем пароля, хранящимся в БД
     * @param $attribute
     * @return void
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильный email или пароль');
            }
        }
    }
}