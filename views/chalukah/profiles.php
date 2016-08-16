<?php

use yii\helpers\Html;
use yii\widgets\ListView;

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

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
	'options' => [
		'tag' => 'div',
		'class' => 'profiles-wrapper',
		'id' => 'profiles-wrapper',
	],
	'layout' => "{items} ",
	'itemView' => '_profile_item',
        //'filterModel' => $searchModel,
        //'columns' => [
          //  'profilename',
            //'header',
            //'description',
            //'starttime',
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

	    //[
	//	'class' => 'yii\grid\ActionColumn',
	//	'buttons' => 
	//	[
	//	    'view' => function ($url, $model, $key) {
        //		return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 
	//		    'index?profilename='.$model->profilename, 
	//		    ['title' => Yii::t('app', 'View'),]);
    	//	    },
	//	],
	//    ],
        //],
    ]); ?>

</div>
<style>
    .profile-item
    {
	color:gray;
	display:block;
	padding-top:30px;
	height:100%;
    }
    .profile-header a
    {
	color:gray;
	text-decoration:none;
    }
    .profile-content-wrapper
    {
	display: inline-block;
	margin-left:20px;
    }
    .profile-item img
    {
	vertical-align:top;
    }
    .profile-item h3
    {
	margin:0;
    }
    .profile-details span
    {
	margin-right:20px;
    }
</style>

