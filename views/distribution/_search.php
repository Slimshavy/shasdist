<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribution-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'profilename') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'starttime') ?>

    <?php // echo $form->field($model, 'endtime') ?>

    <?php // echo $form->field($model, 'actualendtime') ?>

    <?php // echo $form->field($model, 'multiplier') ?>

    <?php // echo $form->field($model, 'finishbeforemultiplying')->checkbox() ?>

    <?php // echo $form->field($model, 'requireconfirmation')->checkbox() ?>

    <?php // echo $form->field($model, 'profilephoto') ?>

    <?php // echo $form->field($model, 'creatoruserid') ?>

    <?php // echo $form->field($model, 'createdate') ?>

    <?php // echo $form->field($model, 'lastupdatedate') ?>

    <?php // echo $form->field($model, 'lastupdateuserid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
