<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property int $publication_id
 * @property string|null $file
 *
 * @property Publication $publication
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publication_id'], 'required'],
            [['publication_id'], 'integer'],
            [['file'], 'string', 'max' => 255],
            [['publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publication::class, 'targetAttribute' => ['publication_id' => 'id']],
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
            'file' => 'File',
        ];
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
