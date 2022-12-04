<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publication".
 *
 * @property int $id
 * @property string $title
 * @property string|null $avatar
 * @property int $price
 * @property string|null $type
 * @property string|null $description
 * @property string|null $dt_add
 * @property int $category_id
 * @property int $seller
 *
 * @property Category $category
 * @property CommentPublication[] $commentPublications
 * @property Files[] $files
 * @property User $seller0
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'category_id', 'seller'], 'required'],
            [['avatar', 'type', 'description'], 'string'],
            [['price', 'category_id', 'seller'], 'integer'],
            [['dt_add'], 'safe'],
            [['title'], 'string', 'max' => 320],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['seller'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['seller' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'avatar' => 'Avatar',
            'price' => 'Price',
            'type' => 'Type',
            'description' => 'Description',
            'dt_add' => 'Dt Add',
            'category_id' => 'Category ID',
            'seller' => 'Seller',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[CommentPublications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentPublications()
    {
        return $this->hasMany(CommentPublication::class, ['publication_id' => 'id']);
    }

    /**
     * Gets query for [[Files]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::class, ['publication_id' => 'id']);
    }

    /**
     * Gets query for [[Seller0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeller0()
    {
        return $this->hasOne(User::class, ['id' => 'seller']);
    }
}
