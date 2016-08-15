<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mesechtos".
 *
 * @property integer $id
 * @property string $nameenglish
 * @property string $namehebrew
 * @property integer $dafcount
 */
class Mesechta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mesechtos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nameenglish', 'namehebrew', 'dafcount'], 'required'],
            [['dafcount'], 'integer'],
            [['nameenglish', 'namehebrew'], 'string', 'max' => 128],
            [['nameenglish'], 'unique'],
            [['namehebrew'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameenglish' => 'English Mesechta',
            'namehebrew' => 'Hebrew Mesechta',
            'dafcount' => 'Daf Count',
	    'lettercount' => 'Letter Count', 
	    'wordcount' => 'Word Count', 
	    'avglettersperdaf' => 'Average Letter Per Daf', 
	    'avgwordsperdaf' => 'Average Words Per Daf',
        ];
    }

    /**
     * @inheritdoc
     * @return MesechtaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MesechtaQuery(get_called_class());
    }
}
