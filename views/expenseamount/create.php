<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ExpenseAmount */

$this->title = 'Create Expense Amount';
$this->params['breadcrumbs'][] = ['label' => 'Expense Amounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expense-amount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
