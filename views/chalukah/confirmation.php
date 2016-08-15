<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfile */

$this->title = 'Confirmation';
$this->params['breadcrumbs'][] = ['label' => 'Chalukah Profiles', 'url' => (Yii::$app->user->isGuest ? ['list'] : ['profiles'])];
$this->params['breadcrumbs'][] = ['label' => $model->distributionprofile->header, 'url' => ['index','profilename'=>$model->distributionprofile->profilename]];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="distribution-profile-update">

    <h1><?= $this->title ?></h1>
    <h3><?= ucfirst($model->user->firstname) ?>, you have successfully chosen to learn Mesechtos <?= $model->mesechtaEnglishName ?>. Please complete the mesechta by <?= date_format(new DateTime($model->distributionprofile->endtime),'m/d/Y') ?>. <br/></br>Thank You!

</div>
