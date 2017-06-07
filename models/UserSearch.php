<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age', 'status', 'register_by'], 'integer'],
            [['registration_id', 'username', 'password', 'forget_key', 'facebook_id', 'image', 'mobile_no', 'alternate_no', 'otp_code', 'device_id', 'nick_name', 'occupation', 'gender', 'opening_balance', 'created_date', 'last_update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'age' => $this->age,
            'status' => $this->status,
            'register_by' => $this->register_by,
            'created_date' => $this->created_date,
            'last_update_date' => $this->last_update_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'forget_key', $this->forget_key])
            ->andFilterWhere(['like', 'facebook_id', $this->facebook_id])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'alternate_no', $this->alternate_no])
            ->andFilterWhere(['like', 'otp_code', $this->otp_code])
            ->andFilterWhere(['like', 'device_id', $this->device_id])
            ->andFilterWhere(['like', 'nick_name', $this->nick_name])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'opening_balance', $this->opening_balance]);

        return $dataProvider;

        // /andFilterWhere(['like', 'registration_id', $this->registration_id])->
    }

    public function validateRegister($data=null)
    {
        $error=array('error'=>false);

        $reg='/^[A-Za-z0-9 _]+$/';
        $latlong='/^[0-9.+-]+$/';
        $regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i"; 
        $regphone = "/^[1-9][0-9]*/";

        if (!isset($data['username']) || strlen(trim($data['username'])) <= 0) {
            $error['error']=true;
            $error['statuscode']=301;
            $error['msg']="Please enter the username.";
        }
        else if (!preg_match($regex, $data['username']))
        {
            $error['error']=true;
            $error['statuscode']=302;
            $error['msg']="Please enter valid email.";
        }
        else if($this->isExistEmail($data['username']))
        {
            $error['error']=true;
            $error['statuscode']=303;
            $error['msg']="Email is already registered.";
        }
        /*else if (!isset($data['name']) || strlen(trim($data['name'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=304;
            $error['msg']="Please enter the name.";
        }
        else if (strlen($data['name'])<2 || strlen($data['name'])>20)
        {
            $error['error']=true;
            $error['statuscode']=305;
            $error['msg']="Name should be within 2-20 characters.";
        }
        else if (!preg_match($reg,$data['name']))
        {
            $error['error']=true;
            $error['statuscode']=306;
            $error['msg']="Please enter valid name.";
        }*/
        else if(!isset($data['password']) || strlen(trim($data['password'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=307;
            $error['msg']="Please enter the password.";
        }
        else if(preg_match('/\s/',$data['password']))
        {
            $error['error']=true;
            $error['statuscode']=308;
            $error['msg']="Please enter the valid password.";
        }
        else if (strlen($data['password'])<6 || strlen($data['password'])>18)
        {
            $error['error']=true;
            $error['statuscode']=309;
            $error['msg']="Password should be within 6-18 characters long.";
        }
        else if (!isset($data['device_id']) || empty($data['device_id'])) 
        {
            $error['error']=true;
            $error['statuscode']=316;
            $error['msg']="Please enter the device id.";
        }
        else
        {
            $error['error']=false;
        }
        return $error;
    }
    public function validateUpdate($data=null)
    {
        $error=array('error'=>false);

        $reg='/^[A-Za-z0-9 _]+$/';
        $latlong='/^[0-9.+-]+$/';
        $regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i"; 
        $regphone = "/^[1-9][0-9]*/";

        if (!isset($data['nick_name']) || strlen(trim($data['nick_name'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=304;
            $error['msg']="Please enter the nick name.";
        }
        else if (strlen($data['nick_name'])<2 || strlen($data['nick_name'])>20)
        {
            $error['error']=true;
            $error['statuscode']=305;
            $error['msg']="Nick name should be within 2-20 characters.";
        }
        else if (!preg_match($reg,$data['nick_name']))
        {
            $error['error']=true;
            $error['statuscode']=306;
            $error['msg']="Please enter valid Nick name.";
        }        
        else if(!isset($data['mobile_no']))
        {
            $error['error']=true;
            $error['msg'] = 'Mobile number is required.';
            $error['statuscode'] = 310;
        }
        else if(!preg_match($regphone, $data['mobile_no']) && !empty($data['mobile_no']))
        { 
            $error['error']=true; 
            $error['statuscode']=311;
            $error['msg']="Please enter valid mobile number.";
        }
        else if(strlen($data['mobile_no'])!=10 && !empty($data['mobile_no']))
        {  
            $error['error']=true;
            $error['statuscode']=312;
            $error['msg']="Mobile number should be of 10 digit long.";
        }        
        /*else if(!isset($data['role']) || strlen(trim($data['role'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=313;
            $error['msg']="User role is required.";
        }
        else if (!in_array($data['role'], array('user')))
        {
            $error['error']=true;
            $error['statuscode']=314;
            $error['msg']="User role is not valid.";
        }
        else if (!isset($data['profile_pic']) || strlen(trim($data['profile_pic'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=315;
            $error['msg']="Please enter the Profile Picture.";
        }
        
        else if(!isset($data['role']) || strlen(trim($data['role'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=317;
            $error['msg']="User role is required.";
        }
        else if (!in_array($data['role'], array('user')))
        {
            $error['error']=true;
            $error['statuscode']=318;
            $error['msg']="User role is not valid.";
        }*/
        else
        {
            $error['error']=false;
        }

        return $error;
    }
    public function validateLogin($data=null)
    {
        $error=array('error'=>false);

        $reg='/^[A-Za-z0-9 _]+$/';
        $latlong='/^[0-9.+-]+$/';
        $regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i"; 
        $regphone = "/^[1-9][0-9]*/";

        if (!isset($data['username']) || strlen(trim($data['username'])) <= 0) {
            $error['error']=true;
            $error['statuscode']=301;
            $error['msg']="Please enter the username.";
        }
        else if (!preg_match($regex, $data['username']))
        {
            $error['error']=true;
            $error['statuscode']=302;
            $error['msg']="Please enter valid email.";
        }   
        else if(!isset($data['password']) || strlen(trim($data['password'])) <= 0)
        {
            $error['error']=true;
            $error['statuscode']=307;
            $error['msg']="Please enter the password.";
        }
        else if(preg_match('/\s/',$data['password']))
        {
            $error['error']=true;
            $error['statuscode']=308;
            $error['msg']="Please enter the valid password.";
        } 
        else
        {
            $error['error']=false;
        }
        return $error;
    }
    public function isExistEmail($email,$role=null,$password=null)
    {
        if($role)
        {
            $condition = array(
                'staffid'=>$email,
                'role'=>$role
            );
        }
        else if($password)
        {
            $password = md5($password);
            $condition = array(
                'staffid'=>$email,
                'password'=>$password
            );
        }
        else
        {
            $condition = array(
                'username'=>$email
            );
        }
        $data=$this->find('all')
                   ->where($condition)
                   ->all();
        if(count($data)>0)
        {
            return true;
        }
        else
        {  
            return false;
        }

    }
    
}
