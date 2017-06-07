<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "target_amount".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $target_amount
 * @property string $average_monthly_income
 * @property integer $no_family
 * @property integer $no_children
 * @property integer $no_earning_member
 * @property string $housing_type
 * @property string $maintenance
 * @property string $investment_habit
 * @property integer $status
 * @property string $created_date
 * @property string $modify_date
 */
class TargetAmount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'target_amount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'target_amount', 'average_monthly_income', 'no_family', 'no_children', 'no_earning_member', 'housing_type', 'maintenance', 'investment_habit', 'status', 'created_date', 'modify_date'], 'required'],
            [['user_id', 'no_family', 'no_children', 'no_earning_member', 'status'], 'integer'],
            [['target_amount', 'average_monthly_income'], 'number'],
            [['created_date', 'modify_date'], 'safe'],
            [['housing_type', 'maintenance', 'investment_habit'], 'string', 'max' => 255],
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
            'target_amount' => 'Target Amount',
            'average_monthly_income' => 'Average Monthly Income',
            'no_family' => 'No Family',
            'no_children' => 'No Children',
            'no_earning_member' => 'No Earning Member',
            'housing_type' => 'Housing Type',
            'maintenance' => 'Maintenance',
            'investment_habit' => 'Investment Habit',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modify_date' => 'Modify Date',
        ];
    }
}
