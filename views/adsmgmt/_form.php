<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdsMgmt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ads-mgmt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ads_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ads_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ads_startdate')->textInput() ?>

    <?= $form->field($model, 'ads_enddate')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modify_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
