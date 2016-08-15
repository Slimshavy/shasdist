<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\DistributionProfile */
$this->title = 'Select Mesechta ' . ' ' . $model->getMesechtaEnglishName();
$this->params['breadcrumbs'][] = ['label' => 'Chalukah Profiles', 'url' => (Yii::$app->user->isGuest ? ['list'] : ['profiles'])];
$this->params['breadcrumbs'][] = ['label' => $model->distributionprofile->header, 'url' => ['index','profilename'=>$model->distributionprofile->profilename]];
$this->params['breadcrumbs'][] = 'Select Mesechta';
?>
<div class="distribution-learner-select">

    <h1><?= $this->title ?></h1>
	
    	<?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($user, 'firstname')->textInput() ?>

	    <?= $form->field($user, 'lastname')->textInput() ?>

	    <?= $form->field($user, 'theemail')->textInput() ?>

	    <div class="form-group">
		<?= Html::submitButton('Select', ['class' => 'btn btn-primary']) ?>
	    </div>

    	<?php ActiveForm::end(); ?>
</div>

