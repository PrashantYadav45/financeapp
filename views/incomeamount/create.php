<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeAmount */

$this->title = 'Create Income Amount';
$this->params['breadcrumbs'][] = ['label' => 'Income Amounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-amount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
