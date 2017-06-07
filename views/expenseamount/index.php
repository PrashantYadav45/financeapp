<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpenseamountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expense Amounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expense-amount-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p> -->
        <!-- <?= Html::a('Create Expense Amount', ['create'], ['class' => 'btn btn-success']) ?> -->
    <!-- </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'expense_category_id',
            'payment_detail',
            'amount',
            // 'note',
            // 'bill_image',
            // 'repeat',
            // 'created_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
