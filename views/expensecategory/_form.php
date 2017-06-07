<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\ExpenseCategory */
/* @var $form yii\widgets\ActiveForm */

//$this->registerCssFile("@web/css/custom.css");

?>

<div class="expense-category-form user-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-6 box-body">

            <?php //= $form->field($model, 'parent_category_id')->textInput() ?>

            <?= $form->field($model, 'category_name')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

            <?= $form->field($model, 'category_slug')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

            <?= $form->field($model, 'category_icon')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

        </div>

        <div class="col-md-6 box-body">

            <?= $form->field($model, 'category_type')->dropDownList(['1' => 'budget', '2' => 'expense']); ?>

            <?= $form->field($model, 'applied_for')->dropDownList(['1' => 'individual', '2' => 'family', '3' => 'group']); ?>

            <?= $form->field($model, 'status')->dropDownList(['1' => 'active', '0' => 'inactive']); ?>

            <?php //= $form->field($model, 'created_date')->textInput() ?>

            <?php //= $form->field($model, 'modify_date')->textInput() ?>

        </div>

        <div class="form-group form_group_button margin">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
