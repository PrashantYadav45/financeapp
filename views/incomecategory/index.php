<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IncomecategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Income Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-category-index">

    <h1><?php //= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Income Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'category_name',
            'category_slug',
            'category_icon',
            'category_type',
            // 'status',
            // 'created_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
