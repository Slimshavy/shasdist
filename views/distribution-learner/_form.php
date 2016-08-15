<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionLearner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribution-learner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'distributionprofileid')->textInput() ?>

    <?= $form->field($model, 'creatoruserid')->textInput() ?>

    <?= $form->field($model, 'mesechtaid')->textInput() ?>

    <?= $form->field($model, 'completenumber')->textInput() ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'lastupdatedate')->textInput() ?>

    <?= $form->field($model, 'lastupdateuserid')->textInput() ?>

    <?= $form->field($model, 'endtime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
