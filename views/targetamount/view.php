<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TargetAmount */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Target Amounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-amount-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
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
            'target_amount',
            'average_monthly_income',
            'no_family',
            'no_children',
            'no_earning_member',
            'housing_type',
            'maintenance',
            'investment_habit',
            'status',
            'created_date',
            'modify_date',
        ],
    ]) ?>

</div>
