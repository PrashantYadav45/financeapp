<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TargetamountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="target-amount-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'target_amount') ?>

    <?= $form->field($model, 'average_monthly_income') ?>

    <?= $form->field($model, 'no_family') ?>

    <?php // echo $form->field($model, 'no_children') ?>

    <?php // echo $form->field($model, 'no_earning_member') ?>

    <?php // echo $form->field($model, 'housing_type') ?>

    <?php // echo $form->field($model, 'maintenance') ?>

    <?php // echo $form->field($model, 'investment_habit') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modify_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
