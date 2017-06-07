<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SetTarget */

$this->title = 'Create Set Target';
$this->params['breadcrumbs'][] = ['label' => 'Set Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
