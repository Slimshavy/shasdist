<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DistributionLearner;

/**
 * DistributionLearnerSearch represents the model behind the search form about `app\models\DistributionLearner`.
 */
class DistributionLearnerSearch extends DistributionLearner
{
    public $mesechtaDafCount;
    public $mesechtaEnglishName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['userid', 'distributionprofileid', 'creatoruserid', 'mesechtaid', 'completenumber', 'lastupdateuserid'], 'integer'],
            //[['distributionprofileid', 'creatoruserid', 'mesechtaid', 'completenumber', 'createdate', 'lastupdatedate', 'lastupdateuserid'], 'required'],
            //[['createdate', 'lastupdatedate', 'endtime'], 'safe'],

            //[['mesechtaDafCount','mesechtaWordCount','mesechtaLetterCount'], 'integer'],
            [['mesechtaDafCount'], 'integer'],
            [['mesechtaEnglishName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($profileid, $params)
    {
        $query = DistributionLearner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
	
	$dataProvider->setSort([
        	'attributes' => [
            		'mesechtaEnglishName' => [
                		'asc' => ['mesechtos.nameenglish' => SORT_ASC],
                		'desc' => ['mesechtos.nameenglish' => SORT_DESC],
            		],
			'mesechtaDafCount' => [
                		'asc' => ['mesechtos.dafcount' => SORT_ASC],
                		'desc' => ['mesechtos.dafcount' => SORT_DESC],
            		],
			'mesechtaWordCount' => [
                		'asc' => ['mesechtos.wordcount' => SORT_ASC],
                		'desc' => ['mesechtos.wordcount' => SORT_DESC],
            		],
			'mesechtaLetterCount' => [
                		'asc' => ['mesechtos.lettercount' => SORT_ASC],
                		'desc' => ['mesechtos.lettercount' => SORT_DESC],
            		]
		]
    	]);

        $query->andFilterWhere(['distributionprofileid' => $profileid]);

	$query->joinWith(['user']);
//unset($params['profilename']);
	$validated = $this->validate();
	$loaded = $this->load($params);

//print "<br/><br/><br/> validated='$validated' <br> loaded='$loaded'<br/>";
//print_r($params);
//print '<br/>';
//print_r($this->getErrors());
        if (!($validated && $loaded)) {
//print '<br/> passed';
		$query->joinWith(['mesechta']);
        	return $dataProvider;
        }

	$query->joinWith(['mesechta' => function ($q) {
		$q->where('mesechtos.nameenglish LIKE "%' . $this->mesechtaEnglishName . '%" AND mesechtos.dafcount = ' . $this->mesechtaDafCount);
	}]);

        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'creatoruserid' => $this->creatoruserid,
            'mesechtaid' => $this->mesechtaid,
        ]);

        return $dataProvider;
    }
}
