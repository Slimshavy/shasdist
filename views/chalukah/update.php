<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfile */

$this->title = 'Update Distribution Profile: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chalukah Profiles', 'url' => (Yii::$app->user->isGuest ? ['list'] : ['profiles'])];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distribution-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
