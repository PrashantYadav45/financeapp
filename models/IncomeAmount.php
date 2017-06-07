<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "income_amount".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $income_category_id
 * @property string $payment_detail
 * @property string $amount
 * @property string $note
 * @property string $bill_image
 * @property integer $repeat
 * @property string $created_date
 * @property string $modify_date
 */
class IncomeAmount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income_amount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'selectdate', 'income_category_id', 'payment_detail', 'amount', 'account', 'note', 'bill_image', 'repeat', 'status', 'created_date', 'modify_date'], 'required'],
            [['user_id', 'income_category_id', 'repeat', 'account', 'status'], 'integer'],
            [['amount'], 'number'],
            [['created_date', 'modify_date'], 'safe'],
            [['payment_detail', 'note', 'bill_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'selectdate' => 'Select Date',
            'user_id' => 'User ID',
            'income_category_id' => 'Income Category ID',
            'payment_detail' => 'Payment Detail',
            'amount' => 'Amount',
            'account' => 'Account',
            'note' => 'Note',
            'bill_image' => 'Bill Image',
            'repeat' => 'Repeat',
            'created_date' => 'Created Date',
            'modify_date' => 'Modify Date',
        ];
    }
}
