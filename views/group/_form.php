<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-category-form user-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>
     <div class="col-md-6 box-body">
    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_icon')->textInput(['maxlength' => true]) ?>
     </div>
	 <div class="col-md-6 box-body">

    <?= $form->field($model, 'group_type')->dropDownList(['1' => 'family', '2' => 'company']);?>

   <?= $form->field($model, 'status')->dropDownList(['1' => 'active', '2' => 'inactive']); ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modify_date')->textInput() ?>
  </div>
  <div class="form-group form_group_button margin">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
