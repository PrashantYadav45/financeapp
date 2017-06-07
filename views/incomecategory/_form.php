<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-category-form user-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-6 box-body">

            <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'category_slug')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'category_icon')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="col-md-6 box-body">

            <?= $form->field($model, 'category_type')->textInput() ?>

            <?= $form->field($model, 'status')->dropDownList(['1' => 'active', '0' => 'inactive']); ?>

            <?php //= $form->field($model, 'created_date')->textInput() ?>

            <?php //= $form->field($model, 'modify_date')->textInput() ?>

        </div>

        <div class="form-group form_group_button margin">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
