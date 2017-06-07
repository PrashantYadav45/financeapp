<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeCategory */

$this->title = 'Update Income Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Income Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="income-category-update">

    <h1><?php //= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
