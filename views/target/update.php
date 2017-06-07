<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetTarget */

$this->title = 'Update Set Target: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Set Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="set-target-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
