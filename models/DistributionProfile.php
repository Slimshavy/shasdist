<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distributionprofiles".
 *
 * @property integer $id
 * @property string $profilename
 * @property string $header
 * @property string $description
 * @property string $starttime
 * @property string $endtime
 * @property string $actualendtime
 * @property integer $multiplier
 * @property boolean $finishbeforemultiplying
 * @property boolean $requireconfirmation
 * @property string $profilephoto
 * @property integer $creatoruserid
 * @property string $createdate
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * @property Users $creatoruser
 * @property Users $lastupdateuser
 */
class DistributionProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distributionprofiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'description', 'starttime', 'endtime'], 'required'],
	    [['profilename'],'match', 'pattern' => '/^[a-zA-Z0-9-]*$/','message' => "Please use valid charchters. (e.g. 'my-chalukas-shas')"],
<<<<<<< HEAD
            [['starttime', 'endtime'], 'date', 'format'=>'yyyy-mm-dd'],
=======
            [['starttime', 'endtime'], 'date'],
>>>>>>> d709df278764298ea7002a00d0bc901e826bcb03
            [['actualendtime', 'createdate', 'lastupdatedate'], 'safe'],
            [['multiplier', 'creatoruserid', 'lastupdateuserid'], 'integer'],
            [['finishbeforemultiplying', 'requireconfirmation','ispublic'], 'boolean'],
            [['profilename', 'header', 'profilephoto'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 1000],
            [['profilename'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profilename' => 'Profile Name',
            'header' => 'Header',
            'description' => 'Description',
            'starttime' => 'Start Date',
            'endtime' => 'End Date',
            'actualendtime' => 'Actualendtime',
            'multiplier' => 'Multiplier',
            'finishbeforemultiplying' => 'Finishbeforemultiplying',
            'requireconfirmation' => 'Require confirmation for Learners',
            'profilephoto' => 'Profilephoto',
            'creatoruserid' => 'Creatoruserid',
            'createdate' => 'Createdate',
            'lastupdatedate' => 'Lastupdatedate',
            'lastupdateuserid' => 'Lastupdateuserid',
	    'ispublic' => 'Make this profile public',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatoruser()
    {
        return $this->hasOne(User::className(), ['id' => 'creatoruserid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLastupdateuser()
    {
        return $this->hasOne(User::className(), ['id' => 'lastupdateuserid']);
    }

    /**
     * @inheritdoc
     * @return DistributionProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistributionProfileQuery(get_called_class());
    }
	
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
		$this->creatoruserid = Yii::$app->user->id;
		$this->createdate = date('Y-m-d H:i:s', time());
		$this->lastupdatedate = date('Y-m-d H:i:s', time());
		$this->lastupdateuserid = Yii::$app->user->id;
		$this->multiplier = 1;
		if(!isset($this->profilename) || empty($this->profilename))
		    $this->profilename = Yii::$app->getSecurity()->generateRandomString(10);
            }
            return true;
        }
        return false;
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

	if($insert)	
	{
	    $sql = "INSERT INTO distributionlearners (distributionprofileid, creatoruserid, mesechtaid, createdate, lastupdatedate, lastupdateuserid, completenumber) 
		(SELECT ".$this->id.",".Yii::$app->user->id.", id, now(), now(), ".Yii::$app->user->id.",1 FROM mesechtos);";

	    $res = Yii::$app->db->createCommand($sql)->execute();
	}
    }
}
