<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expense_amount".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $expense_category_id
 * @property string $payment_detail
 * @property string $amount
 * @property string $note
 * @property string $bill_image
 * @property integer $repeat
 * @property string $created_date
 * @property string $modify_date
 */
class ExpenseAmount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expense_amount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'expense_category_id', 'payment_detail', 'amount', 'note', 'bill_image', 'repeat', 'created_date', 'modify_date'], 'required'],
            [['user_id', 'expense_category_id', 'repeat'], 'integer'],
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
            'user_id' => 'User ID',
            'expense_category_id' => 'Expense Category ID',
            'payment_detail' => 'Payment Detail',
            'amount' => 'Amount',
            'note' => 'Note',
            'bill_image' => 'Bill Image',
            'repeat' => 'Repeat',
            'created_date' => 'Created Date',
            'modify_date' => 'Modify Date',
        ];
    }
}
