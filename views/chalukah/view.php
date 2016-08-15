<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfile */

$this->title = $model->header;
$this->params['breadcrumbs'][] = ['label' => 'Chalukah Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'profilename',
            'description',
            'starttime',
            'endtime',
            'actualendtime',
            'multiplier',
            'finishbeforemultiplying:boolean',
            'requireconfirmation:boolean',
            'profilephoto',
            'creatoruserid',
            'createdate',
            'lastupdatedate',
            'lastupdateuserid',
        ],
    ]) ?>

</div>
