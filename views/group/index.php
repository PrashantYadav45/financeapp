<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p> -->
        <!-- <?= Html::a('Create Group', ['create'], ['class' => 'btn btn-success']) ?> -->
    <!-- </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'category_id',
            'group_name',
            'group_slug',
            // 'group_icon',
            // 'group_type',
            // 'status',
            // 'created_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
