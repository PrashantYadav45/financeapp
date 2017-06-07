<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php /*$form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'registration_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forget_key')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'facebook_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alternate_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otp_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'device_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nick_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?php //= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'register_by')->textInput() ?>

    <?= $form->field($model, 'opening_balance')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'created_date')->textInput() ?>

    <?php //= $form->field($model, 'last_update_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end();*/ ?>

</div>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form role="form" enctype="multipart/form-data"> -->
            <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="username">Username</label>
                          <?php echo $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control', 
                          'placeholder'=>"Username"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <?php echo $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Password"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="forgetKey">Forget Key</label>
                          <?php echo $form->field($model, 'forget_key')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Forget Key"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="deviceid">Device Id</label>
                          <?php echo $form->field($model, 'device_id')->textInput(['maxlength' => true, 'class' => 'form-control', 
                          'placeholder'=>"Device Id"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="otpcode">Otp Code</label>
                          <?php echo $form->field($model, 'otp_code')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Otp Code"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="nickname">Nick Name</label>
                          <?php echo $form->field($model, 'nick_name')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Nick Name"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="registerby">Register By</label>
                          <?php echo $form->field($model, 'register_by')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Register By"])->label(false); ?>
                        </div>
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <?php echo $form->field($model, 'mobile_no')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Mobile"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="alternateNo">Alternate No</label>
                          <?php echo $form->field($model, 'alternate_no')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Alternate No"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="occupation">occupation</label>
                          <?php echo $form->field($model, 'occupation')->textInput(['maxlength' => true, 'class' => 'form-control', 
                          'placeholder'=>"Occupation"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <?php echo $form->field($model, 'gender')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Gender"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="age">Age</label>
                          <?php echo $form->field($model, 'age')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Age"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="openingbalance">Opening Balance</label>
                          <?php echo $form->field($model, 'opening_balance')->textInput(['maxlength' => true, 'class' => 'form-control', 
                           'placeholder'=>"Opening Balance"])->label(false); ?>
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <?php echo $form->field($model, 'image')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
                        </div>
                    </div>
                </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
            <?php ActiveForm::end(); ?>
            <!-- </form> -->
          </div> 
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
