<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribution-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'profilename')->textInput(['maxlength' => true])->label('Unique Profile Name (leave empty to get default identifier)') ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'starttime')->textInput() ?>

    <?= $form->field($model, 'endtime')->textInput() ?>

    <?= $form->field($model, 'multiplier')->textInput() ?>

    <?= $form->field($model, 'finishbeforemultiplying')->checkbox() ?>

    <?= $form->field($model, 'requireconfirmation')->checkbox() ?>

    <?= $form->field($model, 'ispublic')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>

	

</script>
