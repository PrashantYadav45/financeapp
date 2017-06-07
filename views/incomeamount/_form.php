<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeAmount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-category-form user-form box box-primary">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6 box-body">
    <?= $form->field($model, 'user_id')->textInput() ?>
     <?= $form->field($model, 'selectdate')->textInput() ?>
    <?= $form->field($model, 'income_category_id')->textInput() ?>

    <?= $form->field($model, 'payment_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'account')->dropDownList(['1' => 'default', '2' => 'other']);?>
    </div>
	 <div class="col-md-6 box-body">
    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bill_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'repeat')->dropDownList(['1' => 'yes', '0' => 'no']);?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modify_date')->textInput() ?>
    </div>
    <div class="form-group form_group_button margin">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
