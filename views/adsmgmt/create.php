<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AdsMgmt */

$this->title = 'Create Ads Mgmt';
$this->params['breadcrumbs'][] = ['label' => 'Ads Mgmts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-mgmt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
