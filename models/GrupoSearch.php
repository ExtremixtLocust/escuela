<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grupo;

/**
 * GrupoSearch represents the model behind the search form of `app\models\Grupo`.
 */
class GrupoSearch extends Grupo
{
    //variables para los campos personalizados
    public $maestro;
    public $aula;
    public $materia;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gru_id', 'gru_materia_id', 'gru_maestro_id', 'gru_aula_id'], 'integer'],
            [['materia', 'maestro', 'aula'], 'safe'],
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
        $query = Grupo::find()->joinWith(['gruMaestro']);
        $query = Grupo::find()->joinWith(['gruMaestro']);
        $query = Grupo::find()->joinWith(['gruMateria']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //se genera el sort para campos personalizados
        $dataProvider->setSort([
            'attributes' => [
                'gru_id',
                'gru_materia_id',
                'gru_maestro_id',
                'gru_aula_id',
                'materia' => [
                    'asc' => ['mat_nombre' => SORT_ASC],
                    'desc' => ['mat_nombre' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'maestro'=> [  
                    'asc' => ['mae_nombre' => SORT_ASC],
                    'desc' => ['mae_nombre' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'aula'=> [  
                    'asc' => ['aul_numero' => SORT_ASC],
                    'desc' => ['aul_numero' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'gru_id' => $this->gru_id,
            'gru_materia_id' => $this->gru_materia_id,
            'gru_maestro_id' => $this->gru_maestro_id,
            'gru_aula_id' => $this->gru_aula_id,
        ]);

        $query->andFilterWhere(['like', 'mat_nombre', $this->materia])
        ->andFilterWhere(['like', 'mae_nombre', $this->maestro])
        ->andFilterWhere(['like', 'aul_numero', $this->aula]);

        return $dataProvider;
    }
}
