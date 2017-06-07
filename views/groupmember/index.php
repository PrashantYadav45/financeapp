<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupmemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-member-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p> -->
        <!-- <?= Html::a('Create Group Member', ['create'], ['class' => 'btn btn-success']) ?> -->
    <!-- </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'group_id',
            'status',
            'created_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
