<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TargetamountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Target Amounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-amount-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p> -->
        <!-- <?= Html::a('Create Target Amount', ['create'], ['class' => 'btn btn-success']) ?> -->
    <!-- </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'target_amount',
            'average_monthly_income',
            'no_family',
            // 'no_children',
            // 'no_earning_member',
            // 'housing_type',
            // 'maintenance',
            // 'investment_habit',
            // 'status',
            // 'created_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
