<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblCountry */

$this->title = 'Create Tbl Country';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
