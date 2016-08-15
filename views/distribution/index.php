<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistributionProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chalukah Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chalukah Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'profilename',
            'header',
            'description',
            'starttime',
            // 'endtime',
            // 'actualendtime',
            // 'multiplier',
            // 'finishbeforemultiplying:boolean',
            // 'requireconfirmation:boolean',
            // 'profilephoto',
            // 'creatoruserid',
            // 'createdate',
            // 'lastupdatedate',
            // 'lastupdateuserid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
