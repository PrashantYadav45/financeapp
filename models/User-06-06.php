<?php

namespace app\models;

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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */   
    const SCENARIO_CREATE ='create';
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['token', 'username', 'password', 'otp_code', 'device_id', 'register_by', 'status', 'role','created_date', 'last_update_date'];
        return $scenarios;
    }

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
            [[/*'registration_id',*/ 'username'/*, 'password', 'forget_key', 'facebook_id', 'image'*/, 'mobile_no'/*, 'alternate_no', 'otp_code', 'device_id', 'nick_name', 'occupation', 'gender', 'age',*/ /*'status',*/ /*'register_by', 'opening_balance'*//*, 'created_date', 'last_update_date'*/], 'required'],
            [['age', 'status', 'register_by', 'role'], 'integer'],
            //[['created_date', 'last_update_date'], 'safe'],
            [[/*'registration_id',*/ 'mobile_no', 'alternate_no'], 'string', 'max' => 100],
            [['username', 'password', 'forget_key', 'facebook_id', 'image', 'device_id', 'nick_name', 'occupation', 'token'], 'string', 'max' => 255],
            [['otp_code'], 'string', 'max' => 12],
            [['gender'], 'string', 'max' => 20],
            [['opening_balance'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'registration_id' => 'Registration ID',
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
            'role' => 'Role',
            'register_by' => 'Register By',
            'opening_balance' => 'Opening Balance',
            //'created_date' => 'Created Date',
            //'last_update_date' => 'Last Update Date',
        ];
    }
	
	 /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
		
        return self::findOne(['username'=>$username]);
		
		// foreach (self::$users as $user) {
            // if (strcasecmp($user['username'], $username) === 0) {
                // return new static($user);
            // }
        // }

        // return null;
    }
    //---------------------------Login Code-----------------------------//
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
		throw new \yii\base\NotSupportedException();
        //return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
		throw new \yii\base\NotSupportedException();
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
		
        return $this->password === $password;
    }
	//---------------------------Login Code-----------------------------//
}
