<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\group;
use app\models\ExpenseCategory;
use app\models\IncomeCategory;
use app\models\IncomeAmount;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\db\connection;
/**
 * UserController implements the CRUD actions for User model.
 */
class ApiController extends Controller
{
    /**
     * @inheritdoc
     */   
    //public $layout=false;
    public $enableCsrfValidation=false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
        echo "This is index";
    }

    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $response=array();
        $model = new User();
        $model2 = new UserSearch();
        //print_r($model->attributes);      //THIS IS GIVE THE ALL COLUMN OF TABLE
        if(Yii::$app->getRequest()->method==="POST")
        {
            $data=Yii::$app->request->post();
            $error=$model2->validateRegister($data);
            if($error['error'])
            {
                $response=$error;
            }
            else
            {   
                $hashpassword = md5($data["password"]);                
                $data['password']=$hashpassword;
                $data['status']=1;
                $data['role']=2;
                $data['created_date']=date('Y-m-d g:i:s');
                $data['last_update_date']=date('Y-m-d g:i:s');
                $model->scenario = User::SCENARIO_CREATE;
                $model->attributes = $data;
                if ($model->save()) 
                {
                    $response['error']=false;
                    $response['userid']=$model->getPrimaryKey();
                    $response['statuscode']=200;
                    $response['msg']="Success";
                } 
                else 
                {
                    $response['error']=true;
                    $response['statuscode']=202;
                    $response['msg']="Not Save";
                }  
            }
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);
        die;
    }
    //UDPATE REGISTRATION DETAIL
    public function actionUserupdate()
    {
        $response=array();
        $model = new User();
        $model2 = new UserSearch();
        if(Yii::$app->getRequest()->method==="POST")
        {
            $data=Yii::$app->request->post();
            $error=$model2->validateUpdate($data);
            if($error['error'])
            {
                $response=$error;
            }
            else
            {   
                if(!empty($_POST['id']))
                { 
                    //print_r($model->attributes);
                    $model->scenario = User::SCENARIO_CREATE;   
                    if ($model->update($data["id"])) 
                    {
                        $response['error']=false;
                        $response['statuscode']=200;
                        $response['msg']="Success";
                    } 
                    else 
                    {
                        $response['error']=true;
                        $response['statuscode']=202;
                        $response['msg']="Not Save";
                    }  
                }
                else
                {
                    $response['error']=true;
                    $response['statuscode']=402;
                    $response['msg']="User id Empty";
                }             
            }
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);
        die;
    }

    public function actionOtpverify()
    {   
        $response=array();
        if(Yii::$app->getRequest()->method==="POST")
        {
            $data=Yii::$app->request->post();
            if(!empty($data["otpcode"]))
            {
                if(!empty($data["userid"]))
                {
                    $userid=$data["userid"];
                    $userdata=User::find()
                                    ->where(['id' => $userid, 'status' => 1])
                                    ->one(); 
                    if(!empty($userdata))
                    {
                        if($userdata->otp_code==trim($data["otpcode"]))
                        {
                            $response['error']=false;
                            $response['statuscode']=200;
                            $response['msg']="Success";
                        }
                        else
                        {
                            $response['error']=true;
                            $response['statuscode']=404;
                            $response['msg']="Invalid Otp Code.";
                        }
                    }
                    else
                    {
                        $response['error']=true;
                        $response['statuscode']=403;
                        $response['msg']="User not Found.";
                    }
                }
                else
                {
                    $response['error']=true;
                    $response['statuscode']=402;
                    $response['msg']="User id Empty";
                }
            }
            else
            {
                $response['error']=true;
                $response['statuscode']=401;
                $response['msg']="Please Enter Value";
            }            
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);
    }

    ##############################################################################################
    #                       LOGIN SECTION                                                        #
    ##############################################################################################
    public function actionLogin()
    {   
        $response=array();
        $model = new User();
        $model2 = new UserSearch();
        if(Yii::$app->getRequest()->method==="POST")
        {            
            $data=Yii::$app->request->post();
            $error=$model2->validateLogin($data);
            if($error['error'])
            {
                $response=$error;
            }
            else
            {   
                $userdata=$model->find()->where(['username' => $data['username'], 'role' => 2, 'status' => 1])
                                    ->limit(1)
                                    ->orderBy(['id'=>SORT_ASC])
                                    ->one(); 
                if(!empty($userdata))
                {
                    $hashpassword = md5($data["password"]);
                    if($userdata["password"]==$hashpassword)
                    {
                        $response['error']=false;                        
                        $response['userid']=$userdata["id"];
                        $response['statuscode']=200;
                        $response['msg']="Success";
                    }
                    else
                    {
                        $response['error']=true;
                        $response['statuscode']=406;
                        $response['msg']="Invalid Password";
                    }
                }
                else
                {
                    $response['error']=true;
                    $response['statuscode']=405;
                    $response['msg']="Invalid Username";
                }
            }
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);
    }

    ##############################################################################################
    #                       CHANGE PASSWORD SECTION                                              #
    ##############################################################################################
    public function actionChangepassword()
    {   
        $response=array();
        $model = new User();
        if(Yii::$app->getRequest()->method==="POST")
        {   
            $data=Yii::$app->request->post();
            if(!empty($data['id']))
            {
                if(!empty($data['current_password']))
                {   
                    if(!empty($data['new_password']))
                    {   
                        $userdata=$model->find()->where(['id' => $data['id'], 'role' => 2, 'status' => 1])
                                    ->limit(1)
                                    ->orderBy(['id'=>SORT_ASC])
                                    ->one(); 
                        if(!empty($userdata))
                        {
                            $hashpassword = md5($data["current_password"]);
                            if($userdata["password"]==$hashpassword)
                            {
                                $model->scenario = User::SCENARIO_CREATE; 
                                //$model->chgpassword = 'password';  
                                if ($model->update($data["id"])) 
                                {
                                    $response['error']=false;
                                    $response['statuscode']=200;
                                    $response['msg']="Success";
                                } 
                                else 
                                {
                                    $response['error']=true;
                                    $response['statuscode']=202;
                                    $response['msg']="Not Save";
                                }  
                            }
                            else
                            {
                                $response['error']=true;
                                $response['statuscode']=406;
                                $response['msg']="Invalid Password";
                            }
                        }
                        else
                        {
                            $response['error']=true;
                            $response['statuscode']=403;
                            $response['msg']="User not Found.";
                        }
                    }
                    else
                    {
                        $response['error']=true;
                        $response['statuscode']=407;
                        $response['msg']="New Password Not Empty.";
                    }       
                }
                else
                {
                    $response['error']=true;
                    $response['statuscode']=408;
                    $response['msg']="Current Password Not Empty.";
                }
            }
            else
            {
                $response['error']=true;
                $response['statuscode']=402;
                $response['msg']="User id Empty";
            }
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);         
    }
    ##############################################################################################
    #                       ADD GROUP SECTION                                                    #
    ##############################################################################################
    public function actionAddgroup($request="add")
    {
        $response=array();
        $model = new Group();
        if(Yii::$app->getRequest()->method==="POST")
        {   
            $data=Yii::$app->request->post();
            if(!empty($data['user_id']))
            {
                if($request=="add")     // FOR ADD NEW GROUP
                {   
                    $data['group_slug']=$model->clean($data["group_name"]);;
                    $data['status']=1;
                    $data['created_date']=date('Y-m-d g:i:s');
                    $data['modify_date']=date('Y-m-d g:i:s');
                    $model->scenario = Group::SCENARIO_CREATE;
                    $model->attributes = $data;
                    if ($model->save()) 
                    {
                        $response['error']=false;
                        $response['statuscode']=200;
                        $response['msg']="Success";
                    } 
                    else 
                    {
                        $response['error']=true;
                        $response['statuscode']=202;
                        $response['msg']="Not Save";
                    }
                }
                if($request="edit")     // FOR EDIT GROUP
                {
                    $data['group_slug']=$model->clean($data["group_name"]);
                    $data['status']=1;
                    $data['created_date']=date('Y-m-d g:i:s');
                    $data['modify_date']=date('Y-m-d g:i:s');
                    //$model->scenario = Group::SCENARIO_CREATE;
                    $model->attributes = $data;
                    //print_r($model->attributes);
                    //$update = Yii::app()->db->createCommand()->update('group', array('group'=>'new group 1'),'id=:id',array(':id'=>'1'));

                    if ($model->update()) 
                    {
                        $response['error']=false;
                        $response['statuscode']=200;
                        $response['msg']="Success";
                    } 
                    else 
                    {
                        $response['error']=true;
                        $response['statuscode']=202;
                        $response['msg']="Not Save";
                    }
                }
            }
            else
            {
                $response['error']=true;
                $response['statuscode']=402;
                $response['msg']="User id Empty";
            }
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);  
    }
    ##############################################################################################
    #                       GET EXPENSE CATEGORY SECTION                                         #
    ##############################################################################################
    public function actionGetexpcategory()
    {
        $response=array();
        $model = new ExpenseCategory();
        if(Yii::$app->getRequest()->method==="GET")
        {   
            $catdata=$model->find()->where(['status' => 1])
                                    ->orderBy(['category_name'=>SORT_ASC])
                                    ->all(); 
            if(!empty($catdata))
            {
                foreach ($catdata as $value) 
                {                    $cat[]=array(
                            'id' => $value['id'],
                            'parent_category_id'=>$value['parent_category_id'],
                            'category_name'=>$value['category_name'],
                            'category_slug'=>$value['category_slug'],
                            'category_icon'=>$value['category_icon'],
                            'category_type'=>$value['category_type'],
                            'applied_for'=>$value['applied_for'],
                            'status'=>$value['status'],
                            'created_date'=>$value['created_date'],
                            'modify_date'=>$value['modify_date'],
                        );
                }
                $response['error']=false;
                $response['statuscode']=200;
                $response['msg']="Success";
                $response['category']=$cat;
            }
            else
            {
                $response['error']=true;
                $response['statuscode']=409;
                $response['msg']="No Record Found";
            }            
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);  
    }
    ##############################################################################################
    #                       GET INCOME CATEGORY SECTION                                          #
    ##############################################################################################
    public function actionGetincomecategory()
    {
        $response=array();
        $model = new IncomeCategory();
        if(Yii::$app->getRequest()->method==="GET")
        {   
            $catdata=$model->find()->where(['status' => 1])
                                    ->orderBy(['category_name'=>SORT_ASC])
                                    ->all(); 
            if(!empty($catdata))
            {
                foreach ($catdata as $value) 
                {
                    $cat[]=array(
                            'id' => $value['id'],
                            'category_name'=>$value['category_name'],
                            'category_slug'=>$value['category_slug'],
                            'category_icon'=>$value['category_icon'],
                            'category_type'=>$value['category_type'],
                            'status'=>$value['status'],
                            'created_date'=>$value['created_date'],
                            'modify_date'=>$value['modify_date'],
                        );
                }
                $response['error']=false;
                $response['statuscode']=200;
                $response['msg']="Success";
                $response['category']=$cat;
            }
            else
            {
                $response['error']=true;
                $response['statuscode']=409;
                $response['msg']="No Record Found";
            }   
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);  
    }
    ##############################################################################################
    #                       ADD/EDIT INCOME                                                      #
    ##############################################################################################
    public function actionIncome($request="add",$id=null)
    {
        $response=array();
        $model = new IncomeAmount();
        if(Yii::$app->getRequest()->method==="POST")
        {   
            $data=Yii::$app->request->post();
            if(!empty($data['user_id']))
            {               
                if($request=="add")     // FOR ADD NEW INCOME
                {   
                    $data['income_category_id']=$data["category_id"];
                    $data['status']=1;
                    $data['created_date']=date('Y-m-d g:i:s');
                    $data['modify_date']=date('Y-m-d g:i:s');
                    $model->attributes = $data;
                    if ($model->save()) 
                    {
                        $response['error']=false;
                        $response['statuscode']=200;
                        $response['msg']="Success";
                    } 
                    else 
                    {
                        $response['error']=true;
                        $response['statuscode']=202;
                        $response['msg']="Not Save";
                    }
                }
                if($request=="edit")     // FOR EDIT GROUP
                {
                    $userdata=$model->find()->where(['id' => $id, 'status' => 1])
                                    ->limit(1)
                                    ->one();
                    if(!empty($userdata))
                    {
                        $updatearr=array(
                            'income_category_id' => $data["category_id"],
                            'payment_detail' => $data["payment_detail"],
                            'amount' => $data["amount"],
                            'account' => $data["account"],
                            'note' => $data["note"],
                            'bill_image' => $data["bill_image"],
                            'repeat' => $data["repeat"],
                            'modify_date' => date('Y-m-d g:i:s'),
                            );
                        $upd=IncomeAmount::updateAll($updatearr, 'id = '.$id);
                        if ($upd===1) 
                        {
                            $response['error']=false;
                            $response['statuscode']=200;
                            $response['msg']="Success";
                        } 
                        else 
                        {
                            $response['error']=true;
                            $response['statuscode']=202;
                            $response['msg']="Not Save";
                        }
                    }
                    else
                    {
                        $response['error']=true;
                        $response['statuscode']=409;
                        $response['msg']="No Record Found";
                    }                    
                }
            }
            else
            {
                $response['error']=true;
                $response['statuscode']=402;
                $response['msg']="User id Empty";
            }
        }
        else
        {
            $response['error']=true;
            $response['statuscode']=512;
            $response['msg']="Invalid Request";
        }
        echo json_encode($response);  
    }




    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
