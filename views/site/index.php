<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<div class="site-index">

    <style>
	body
	{
	    background-image: url("/images/gemara3.jpg") ; 
    	    background-repeat: no-repeat;
    	    background-position: center center;
    	    background-attachment: fixed;
  	    -webkit-background-size: cover;
  	    -moz-background-size: cover;
  	    -o-background-size: cover;
  	    background-size: cover;
	}
	.footer
	{
	    background-color: transparent;
	    border-top: 1px solid transparent;
	}
    </style>

    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">You have come to the right place to Split A Shas.</p>

        <p><?= Html::a('Get Started', '/site/register',Array('class'=>'btn btn-lg btn-success')); ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Split a Shas</h2>

                <p>Want to split the Shas? Split A Shas is the place to be. You will have the ability to setup a Split A Shas profile
		which allows users to select a Mesechta to learn. Whether it is L'ilui Nishmas, L'zchus or for any event, Split A Shas will make it convenient
		for you and your learners to select and track the distribution of your Split A Shas. After registering and logging in, click below to start your own 
                Split A Shas distribution</p>

                <p><?= Html::a('Create a distribution profile', '/chalukah/create', Array('class'=>'btn btn-default')); ?></p>
            </div>
            <div class="col-lg-6">
                <h2>Learn a Masechta</h2>

                <p>Want to help finish a shas? Split A Shas is the place to be. You have the ability to choose a Mesechta to learn to help complete the shas.
		You can choose from a list of public Split A Shas distributions, or choose from a specific Split A Shas distribution by following the link 
		provided by your Split A Shas distribution creato.</p>

                <p><?= Html::a('View Split A Shas distributions', '/chalukah/list', Array('class'=>'btn btn-default')); ?></p>
            </div>
        </div>

    </div>
</div>
