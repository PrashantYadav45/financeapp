<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TargetAmount */

$this->title = 'Update Target Amount: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Target Amounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="target-amount-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
