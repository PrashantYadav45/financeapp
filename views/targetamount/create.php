<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TargetAmount */

$this->title = 'Create Target Amount';
$this->params['breadcrumbs'][] = ['label' => 'Target Amounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-amount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
