<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MesechtaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Choose Mesechtas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesechta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nameenglish',
            'namehebrew',
            'dafcount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
