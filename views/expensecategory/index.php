<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpensecategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expense Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expense-category-index">

    <h1><?php //= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expense Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'parent_category_id',
            'category_name',
            'category_slug',
            'category_icon',
            // 'category_type',
            // 'applied_for',
            // 'status',
            // 'created_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
