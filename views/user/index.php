<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p> -->
        <!-- <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?> -->
    <!-- </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'registration_id',
            'username',
            //'password',
            //'forget_key',
            // 'facebook_id',
            // 'image',
             'mobile_no',
            // 'alternate_no',
            // 'otp_code',
            // 'device_id',
            // 'nick_name',
            // 'occupation',
             'gender',
            // 'age',
            // 'status',
            // 'register_by',
            // 'opening_balance',
            // 'created_date',
            // 'last_update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
