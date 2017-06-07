<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExpenseCategory */

$this->title = 'Update Expense Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expense Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expense-category-update">

    <h1><?php //= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
