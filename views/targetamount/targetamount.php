<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TargetAmount */
/* @var $form ActiveForm */
?>
<div class="targetamount">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'target_amount') ?>
        <?= $form->field($model, 'average_monthly_income') ?>
        <?= $form->field($model, 'no_family') ?>
        <?= $form->field($model, 'no_children') ?>
        <?= $form->field($model, 'no_earning_member') ?>
        <?= $form->field($model, 'housing_type') ?>
        <?= $form->field($model, 'maintenance') ?>
        <?= $form->field($model, 'investment_habit') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'created_date') ?>
        <?= $form->field($model, 'modify_date') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- targetamount -->
