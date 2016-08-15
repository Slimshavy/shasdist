<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfile */

$this->title = 'Create Chalukah Profile';
$this->params['breadcrumbs'][] = ['label' => 'Chalukah Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribution-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
