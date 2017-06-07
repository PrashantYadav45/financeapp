<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExpenseCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expense-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_category_id')->textInput() ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_type')->textInput() ?>

    <?= $form->field($model, 'applied_for')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modify_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
