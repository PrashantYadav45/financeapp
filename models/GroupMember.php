<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_member".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $group_id
 * @property integer $status
 * @property string $created_date
 * @property string $modify_date
 */
class GroupMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id', 'status', 'created_date', 'modify_date'], 'required'],
            [['user_id', 'group_id', 'status'], 'integer'],
            [['created_date', 'modify_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'group_id' => 'Group ID',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modify_date' => 'Modify Date',
        ];
    }
    
}
