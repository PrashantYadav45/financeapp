<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeCategory */

$this->title = 'Create Income Category';
$this->params['breadcrumbs'][] = ['label' => 'Income Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-category-create">

    <h1><?php //= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
