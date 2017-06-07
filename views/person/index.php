<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= /*GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'country_id',
            'parent_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);*/ 
	GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'fullName',
        ['class' => 'yii\grid\ActionColumn'],
    ]
]);
	?>
</div>
