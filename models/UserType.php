<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usertype".
 *
 * @property integer $id
 * @property string $usertype
 * @property string $createdate
 * @property string $lastupdatedate
 * @property integer $lastupdateuserid
 *
 * @property Users[] $users
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usertype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createdate', 'lastupdatedate', 'lastupdateuserid'], 'required'],
            [['id', 'lastupdateuserid'], 'integer'],
            [['createdate', 'lastupdatedate'], 'safe'],
            [['usertype'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usertype' => 'Usertype',
            'createdate' => 'Createdate',
            'lastupdatedate' => 'Lastupdatedate',
            'lastupdateuserid' => 'Lastupdateuserid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['usertypeid' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTypeQuery(get_called_class());
    }
}
