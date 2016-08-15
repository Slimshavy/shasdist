<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionLearnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribution-learner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'distributionprofileid') ?>

    <?= $form->field($model, 'creatoruserid') ?>

    <?= $form->field($model, 'mesechtaid') ?>

    <?php // echo $form->field($model, 'completenumber') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'lastupdatedate') ?>

    <?php // echo $form->field($model, 'lastupdateuserid') ?>

    <?php // echo $form->field($model, 'endtime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
