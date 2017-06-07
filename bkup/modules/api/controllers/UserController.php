<?php

namespace app\modules\api\controllers;
use app\modules\api\models\User;

class UserController extends \yii\web\Controller
{
	public $enableCsrfValidation=false;
	
    public function actionIndex()
    {
		//echo "hiii"; exit;
        return $this->render('default\index');
    }
	
	public function actionCreate()
	{
		//echo "create"; exit;
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //this will return response in JSON
		
		//return array('status' => true);
		$user = new User(); 
		$user->scenario = User::SCENARIO_CREATE;
		$user->attributes = \Yii::$app->request->post();
		
		if($user->validate())
		{
			$user->save();
			return array('status' => true, 'data'=> 'user create successfully');
		}
		else{
			return array('status' => false, 'data'=> $user->getErrors());
		}
	}

}
