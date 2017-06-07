<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

//$this->registerCssFile("@web/css/custom.css");

?>

<div class="user-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-6 box-body">

            <?php //= $form->field($model, 'registration_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control', 
              'placeholder'=>"Username"]); ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Password"]); ?>

            <?= $form->field($model, 'forget_key')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Forget Key"]); ?>

            <?= $form->field($model, 'facebook_id')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Facebook Id"]) ?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true, 'class' => 'form-control']); ?>

            <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Mobile No"]); ?>

            <?= $form->field($model, 'alternate_no')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Alternate No"]); ?>

            <?= $form->field($model, 'nick_name')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Nick Name"]); ?>

            <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Status"]) ?>

        </div>  

        <div class="col-md-6 box-body">

            <?= $form->field($model, 'occupation')->textInput(['maxlength' => true, 'class' => 'form-control', 
              'placeholder'=>"Occupation"]); ?>

            <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Gender"]); ?>
  
            <?= $form->field($model, 'age')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Age"]); ?>

            <?= $form->field($model, 'otp_code')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Otp Code"]); ?>

            <?= $form->field($model, 'device_id')->textInput(['maxlength' => true, 'class' => 'form-control', 
              'placeholder'=>"Device Id"]); ?>

            <?= $form->field($model, 'register_by')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Register By"]); ?>

            <?= $form->field($model, 'opening_balance')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Opening Balance"]); ?>

            <?= $form->field($model, 'role')->textInput(['maxlength' => true, 'class' => 'form-control', 
               'placeholder'=>"Role"]) ?>

            <?php //= $form->field($model, 'created_date')->textInput() ?>

            <?php //= $form->field($model, 'last_update_date')->textInput() ?>

        </div>

        <div class="form-group form_group_button">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>


