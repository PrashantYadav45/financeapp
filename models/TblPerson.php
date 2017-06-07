<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_person".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $country_id
 * @property integer $parent_id
 */
class TblPerson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['country_id', 'parent_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 60],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'country_id' => 'Country ID',
            'parent_id' => 'Parent ID',
			'fullName' => Yii::t('app', 'Full Name')
        ];
    }
	
	public function getFullName(){
		return $this->first_name. ''. $this->last_name;
	}
}
