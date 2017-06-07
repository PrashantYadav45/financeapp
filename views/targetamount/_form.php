<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TargetAmount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="target-amount-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'target_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'average_monthly_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_family')->textInput() ?>

    <?= $form->field($model, 'no_children')->textInput() ?>

    <?= $form->field($model, 'no_earning_member')->textInput() ?>

    <?= $form->field($model, 'housing_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintenance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investment_habit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modify_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
