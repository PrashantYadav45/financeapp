<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SetTarget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="set-target-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_member')->textInput() ?>

    <?= $form->field($model, 'children_no')->textInput() ?>

    <?= $form->field($model, 'house_type')->textInput() ?>

    <?= $form->field($model, 'monthly_rent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investment_habit')->textInput() ?>

    <?= $form->field($model, 'suggest_target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'working_member')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modify_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
