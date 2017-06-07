<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExpenseAmount */

$this->title = 'Update Expense Amount: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expense Amounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expense-amount-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
