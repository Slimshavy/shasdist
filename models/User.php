<?php

namespace app\models;

use Yii;
use yii\validators\RequiredValidator; 
use yii\validators\Validator;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $thelogin
 * @property string $thepass
 * @property string $theemail
 * @property string $firstname
 * @property integer $usertypeid
 * @property string $lastname
 * @property string $cellphone
 * @property string $homephone
 * @property string $registrationdate
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * @property Distributionadmins[] $distributionadmins
 * @property Distributionadmins[] $distributionadmins0
 * @property Distributionadmins[] $distributionadmins1
 * @property Distributionprofile[] $distributionprofiles
 * @property Distributionlearners[] $distributionlearners
 * @property Distributionlearners[] $distributionlearners0
 * @property Distributionlearners[] $distributionlearners1
 * @property Distributionlearners[] $distributionlearners2
 * @property Distributionprofile[] $distributionprofiles0
 * @property Distributionprofile[] $distributionprofiles1
 * @property Distributionprofile[] $distributionprofiles2
 * @property Distributionprofiles[] $distributionprofiles3
 * @property Distributionprofiles[] $distributionprofiles4
 * @property Usertype $usertype
 * @property User $lastupdateuser
 * @property User[] $users
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $thepassconfirm;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            $this->usertypeid == 2 
		? [['thelogin','thepass','theemail', 'firstname', 'usertypeid', 'lastname', 'registrationdate', 'lastupdatedate'], 'required']
		: [['theemail', 'firstname', 'usertypeid', 'lastname', 'registrationdate', 'lastupdatedate'], 'required'],
            [['usertypeid', 'lastupdateuserid'], 'integer'],
            [['thelogin', 'thepass', 'theemail', 'firstname', 'lastname'], 'string', 'max' => 128],
	    //[['thelogin','thepass'],'requireField'],
            [['cellphone', 'homephone'], 'string', 'max' => 10],
            [['thelogin'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thelogin' => 'Username',
            'thepass' => 'Password',
	    'thepassconfirm' => 'Confirm Password',
            'theemail' => 'Email Address',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'cellphone' => 'Cell Phone',
            'homephone' => 'Home Phone',
        ];
    }

    public function getUsername()
    {
	return $this->thelogin;
    }

    public function getPassword()
    {
	return $this->thepass;
    }

    public function getFullName()
    {
	return ucfirst($this->firstname).' '.ucfirst($this->lastname);
    }

    public function isAdmin()
    {
	return $this->usertypeid === 0;
    }

    public function findByUsername($username)
    {
	$user  = User::findOne(['thelogin' => $username,]);
	
	return $user;
    }

    //public function requireField($attribute, $params)
    //{
//	if($this->usertypeid == 2)
///	{
//	    $ev = Validator::createValidator('required', $this, $attribute, $params);
  //          if(!$ev->validate($this))
    //        {
      //          $this->addError($attribute, 'Error message.');
        //    }
	//}
    //}

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this, 0);
        }
        return false;
    }

    public function validatePassword($password)
    {
	return $password === $this->thepass;
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {}

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionadmins()
    {
        return $this->hasMany(Distributionadmins::className(), ['userid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionadmins0()
    {
        return $this->hasMany(Distributionadmins::className(), ['creatoruserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionadmins1()
    {
        return $this->hasMany(Distributionadmins::className(), ['lastupdateuserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionprofiles()
    {
        return $this->hasMany(Distributionprofile::className(), ['id' => 'distributionprofileid'])->viaTable('distributionadmins', ['userid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionlearners()
    {
        return $this->hasMany(Distributionlearners::className(), ['userid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionlearners0()
    {
        return $this->hasMany(Distributionlearners::className(), ['creatoruserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionlearners1()
    {
        return $this->hasMany(Distributionlearners::className(), ['creatoruserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionlearners2()
    {
        return $this->hasMany(Distributionlearners::className(), ['lastupdateuserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionprofiles0()
    {
        return $this->hasMany(Distributionprofile::className(), ['id' => 'distributionprofileid'])->viaTable('distributionlearners', ['userid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionprofiles1()
    {
        return $this->hasMany(Distributionprofile::className(), ['creatoruserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionprofiles2()
    {
        return $this->hasMany(Distributionprofile::className(), ['lastupdateuserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionprofiles3()
    {
        return $this->hasMany(Distributionprofiles::className(), ['creatoruserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributionprofiles4()
    {
        return $this->hasMany(Distributionprofiles::className(), ['lastupdateuserid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsertype()
    {
        return $this->hasOne(Usertype::className(), ['id' => 'usertypeid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLastupdateuser()
    {
        return $this->hasOne(User::className(), ['id' => 'lastupdateuserid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['lastupdateuserid' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
