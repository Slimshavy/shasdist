<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mesechta;

/**
 * MesechtaSearch represents the model behind the search form about `app\models\Mesechta`.
 */
class MesechtaSearch extends Mesechta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dafcount'], 'integer'],
            [['nameenglish', 'namehebrew'], 'safe'],
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
    public function search($params)
    {
        $query = Mesechta::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dafcount' => $this->dafcount,
        ]);

        $query->andFilterWhere(['like', 'nameenglish', $this->nameenglish])
            ->andFilterWhere(['like', 'namehebrew', $this->namehebrew]);

        return $dataProvider;
    }
}
