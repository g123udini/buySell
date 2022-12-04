<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $login
 * @property string|null $dt_add
 * @property string|null $avatar
 * @property int|null $phone
 * @property string|null $telegram
 *
 * @property Auth[] $auths
 * @property Publication[] $publications
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'login'], 'required'],
            [['dt_add'], 'safe'],
            [['avatar'], 'string'],
            [['phone'], 'integer'],
            [['email', 'login'], 'string', 'max' => 320],
            [['password', 'telegram'], 'string', 'max' => 64],
            [['email'], 'unique'],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'login' => 'Login',
            'dt_add' => 'Dt Add',
            'avatar' => 'Avatar',
            'phone' => 'Phone',
            'telegram' => 'Telegram',
        ];
    }

    /**
     * Gets query for [[Auths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuths()
    {
        return $this->hasMany(Auth::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Publications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublications()
    {
        return $this->hasMany(Publication::class, ['seller' => 'id']);
    }
}
