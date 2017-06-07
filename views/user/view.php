<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
            // 'id',
            // 'registration_id',
            'username',
            'password',
            'forget_key',
            'facebook_id',
            'image',
            'mobile_no',
            'alternate_no',
            'otp_code',
            'device_id',
            'nick_name',
            'occupation',
            'gender',
            'age',
            'status',
            'register_by',
            'opening_balance',
            'created_date',
            'last_update_date',
        ],
    ]) ?>

</div>
