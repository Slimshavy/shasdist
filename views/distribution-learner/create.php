<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DistributionLearner */

$this->title = 'Create Distribution Learner';
$this->params['breadcrumbs'][] = ['label' => 'Distribution Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-learner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
