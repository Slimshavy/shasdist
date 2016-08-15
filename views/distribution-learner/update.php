<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionLearner */

$this->title = 'Update Distribution Learner: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Distribution Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distribution-learner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
