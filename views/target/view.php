<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SetTarget */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Set Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="set-target-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'income',
            'family_member',
            'children_no',
            'house_type',
            'monthly_rent',
            'investment_habit',
            'suggest_target',
            'working_member',
            'status',
            'created_date',
            'modify_date',
        ],
    ]) ?>

</div>
