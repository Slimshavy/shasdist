<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;
?>

<article class="profile-item">
    <img src="/images/profiles/<?= $model->profilephoto ?>" alt="Profile Picture" height="100" width="100">
    <div class="profile-content-wrapper">
    	<div class="profile-header">
	    <h3><?= Html::a(Html::encode($model->header), 
		Url::toRoute(['index', 'profilename' => Html::encode($model->profilename)]), ['title' => Html::encode($model->description)]) ?></h3>
    	</div>
	<div class="profile-details">
	    <b>Created By:</b><?= $model->creatoruser->fullName ?>
	    <br/><br/>
	    <span><b>Start Date: </b><?= date_format(new DateTime($model->starttime),'m/d/Y') ?></span>
	    <span><b class='profile-end'>End Date: </b><?= date_format(new DateTime($model->endtime),'m/d/Y') ?></span>
	</div>
	<?= !Yii::$app->user->isGuest && 
	    (Yii::$app->user->id == $model->creatoruserid  || User::findIdentity(Yii::$app->user->id)->thelogin == "admin")
<<<<<<< HEAD
		? Html::a("View",Url::toRoute(['view', 'id' => $model->id])) : "" ?> 
=======
		? Html::a("Update",Url::toRoute(['view', 'id' => $model->id])) : "" ?> 
>>>>>>> d709df278764298ea7002a00d0bc901e826bcb03
    </div>
</article>
