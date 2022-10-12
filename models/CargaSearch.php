<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carga;

/**
 * CargaSearch represents the model behind the search form of `app\models\Carga`.
 */
class CargaSearch extends Carga
{
    public $materia;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'car_reticula_id', 'car_materia_id'], 'integer'],
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
        $query = Carga::find();

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
            'car_id' => $this->car_id,
            'car_reticula_id' => $this->car_reticula_id,
            'car_materia_id' => $this->car_materia_id,
        ]);

        return $dataProvider;
    }
}
