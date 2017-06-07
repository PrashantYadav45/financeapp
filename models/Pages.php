<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $created_date
 * @property string $modify_date
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'status', 'created_date', 'modify_date'], 'required'],
            [['content'], 'string'],
            [['status'], 'integer'],
            [['created_date', 'modify_date'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modify_date' => 'Modify Date',
        ];
    }
}
