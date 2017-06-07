<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $group_name
 * @property string $group_slug
 * @property string $group_icon
 * @property integer $group_type
 * @property integer $status
 * @property string $created_date
 * @property string $modify_date
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'group_name', 'group_slug', 'group_icon', 'group_type', 'status', 'created_date', 'modify_date'], 'required'],
            [['user_id', 'category_id', 'group_type', 'status'], 'integer'],
            [['created_date', 'modify_date'], 'safe'],
            [['group_name', 'group_slug', 'group_icon'], 'string', 'max' => 255],
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
            'category_id' => 'Category ID',
            'group_name' => 'Group Name',
            'group_slug' => 'Group Slug',
            'group_icon' => 'Group Icon',
            'group_type' => 'Group Type',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modify_date' => 'Modify Date',
        ];
    }

    const SCENARIO_CREATE ='create';
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['user_id', 'category_id', 'group_name', 'group_slug', 'group_icon', 'group_type', 'status', 'created_date', 'modify_date'];
        return $scenarios;
    }
        
    public function clean($string) 
    {
       $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
       return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); // Removes special chars.
    }

}
