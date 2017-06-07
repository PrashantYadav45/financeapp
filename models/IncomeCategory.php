<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "income_category".
 *
 * @property integer $id
 * @property string $category_name
 * @property string $category_slug
 * @property string $category_icon
 * @property integer $category_type
 * @property integer $status
 * @property string $created_date
 * @property string $modify_date
 */
class IncomeCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name', 'category_slug', 'category_icon'/*, 'category_type'*/, 'status'/*, 'created_date', 'modify_date'*/], 'required'],
            [['category_type', 'status'], 'integer'],
            //[['created_date', 'modify_date'], 'safe'],
            [['category_name', 'category_slug', 'category_icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'category_slug' => 'Category Slug',
            'category_icon' => 'Category Icon',
            'category_type' => 'Category Type',
            'status' => 'Status',
            //'created_date' => 'Created Date',
            //'modify_date' => 'Modify Date',
        ];
    }
}
