<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trabajador;

/**
 * TrabajadorSearch represents the model behind the search form of `app\models\Trabajador`.
 */
class TrabajadorSearch extends Trabajador
{
    //variable para añadir departemento al search
    public $departamento;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_id', 'tra_departamento_id'], 'integer'],
            [['tra_nombre', 'tra_appaterno', 'tra_apmaterno', 'tra_rfc', 'tra_direccion', 'tra_telefono', 'tra_correo' , 'departamento'], 'safe'],
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
        //$query = Trabajador::find();
        //hacemos in Join
        $query = Trabajador::find()->joinWith(['traDepartamento']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //se genera el sort para campos personalizados
        $dataProvider->setSort([
            'attributes' => [
                'departamento' => [
                    'asc' => ['dep_nombre' => SORT_ASC],
                    'desc' => ['dep_nombre' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'tra_nombre',
                'tra_appaterno',
                'tra_apmaterno',
                'tra_rfc' ,
                'tra_telefono',
                'tra_direccion',
                'tra_correo',
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
            'tra_id' => $this->tra_id,
            'tra_departamento_id' => $this->tra_departamento_id,
        ]);

        $query->andFilterWhere(['like', 'tra_nombre', $this->tra_nombre])
            ->andFilterWhere(['like', 'tra_appaterno', $this->tra_appaterno])
            ->andFilterWhere(['like', 'tra_apmaterno', $this->tra_apmaterno])
            ->andFilterWhere(['like', 'tra_rfc', $this->tra_rfc])
            ->andFilterWhere(['like', 'tra_direccion', $this->tra_direccion])
            ->andFilterWhere(['like', 'tra_telefono', $this->tra_telefono])
            ->andFilterWhere(['like', 'tra_correo', $this->tra_correo])
            ->andFilterWhere(['like', 'dep_nombre', $this->departamento]);

        return $dataProvider;
    }
}
