<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $registration_id
 * @property string $username
 * @property string $password
 * @property string $forget_key
 * @property string $facebook_id
 * @property string $image
 * @property string $mobile_no
 * @property string $alternate_no
 * @property string $otp_code
 * @property string $device_id
 * @property string $nick_name
 * @property string $occupation
 * @property string $gender
 * @property integer $age
 * @property integer $status
 * @property integer $register_by
 * @property string $opening_balance
 * @property string $created_date
 * @property string $last_update_date
 */
class User extends \yii\db\ActiveRecord
{
	const SCENARIO_CREATE ='create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registration_id', 'username', 'password', 'forget_key', 'facebook_id', 'image', 'mobile_no', 'alternate_no', 'otp_code', 'device_id', 'nick_name', 'occupation', 'gender', 'age', 'status', 'register_by', 'opening_balance', 'created_date', 'last_update_date'], 'required'],
            [['age', 'status', 'register_by'], 'integer'],
            [['created_date', 'last_update_date'], 'safe'],
            [['registration_id', 'mobile_no', 'alternate_no'], 'string', 'max' => 100],
            [['username', 'password', 'forget_key', 'facebook_id', 'image', 'device_id', 'nick_name', 'occupation'], 'string', 'max' => 255],
            [['otp_code'], 'string', 'max' => 12],
            [['gender'], 'string', 'max' => 20],
            [['opening_balance'], 'string', 'max' => 50],
        ];
    }
	
	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios['create'] = ['username', 'mobile_no'];
		return $scenarios;
	}
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_id' => 'Registration ID',
            'username' => 'Username',
            'password' => 'Password',
            'forget_key' => 'Forget Key',
            'facebook_id' => 'Facebook ID',
            'image' => 'Image',
            'mobile_no' => 'Mobile No',
            'alternate_no' => 'Alternate No',
            'otp_code' => 'Otp Code',
            'device_id' => 'Device ID',
            'nick_name' => 'Nick Name',
            'occupation' => 'Occupation',
            'gender' => 'Gender',
            'age' => 'Age',
            'status' => 'Status',
            'register_by' => 'Register By',
            'opening_balance' => 'Opening Balance',
            'created_date' => 'Created Date',
            'last_update_date' => 'Last Update Date',
        ];
    }
}
