<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment_publication".
 *
 * @property int $id
 * @property int $publication_id
 * @property int $comment_id
 *
 * @property Comment $comment
 * @property Publication $publication
 */
class CommentPublication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_publication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publication_id', 'comment_id'], 'required'],
            [['publication_id', 'comment_id'], 'integer'],
            [['publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publication::class, 'targetAttribute' => ['publication_id' => 'id']],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::class, 'targetAttribute' => ['comment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'publication_id' => 'Publication ID',
            'comment_id' => 'Comment ID',
        ];
    }

    /**
     * Gets query for [[Comment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::class, ['id' => 'comment_id']);
    }

    /**
     * Gets query for [[Publication]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublication()
    {
        return $this->hasOne(Publication::class, ['id' => 'publication_id']);
    }
}
