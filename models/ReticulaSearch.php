<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reticula;

/**
 * ReticulaSearch represents the model behind the search form of `app\models\Reticula`.
 */
class ReticulaSearch extends Reticula
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ret_id'], 'integer'],
            [['ret_carrera'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Reticula::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ret_id' => $this->ret_id,
        ]);

        $query->andFilterWhere(['like', 'ret_carrera', $this->ret_carrera]);

        return $dataProvider;
    }
}
