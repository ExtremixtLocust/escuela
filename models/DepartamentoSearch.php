<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departamento;

/**
 * DepartamentoSearch represents the model behind the search form of `app\models\Departamento`.
 */
class DepartamentoSearch extends Departamento
{

    //variable para añadir proveedor al search
    public $proveedor;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_id', 'dep_proveedor_id'], 'integer'],
            //añadimos la variable creada para que sea segura
            [['dep_nombre' , 'proveedor'], 'safe'],
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
        //hacemos un Join
        //$query = Maestro::find();
        $query = Departamento::find()->joinWith(['depProveedor']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //se genera el sort para campos personalizados
        $dataProvider->setSort([
            'attributes' => [
                'proveedor' => [
                    'asc' => ['pro_nombre' => SORT_ASC],
                    'desc' => ['pro_nombre' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'dep_nombre',
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
            'dep_id' => $this->dep_id,
            'dep_proveedor_id' => $this->dep_proveedor_id,
        ]);

        $query->andFilterWhere(['like', 'dep_nombre', $this->dep_nombre])
        ->andFilterWhere(['like', 'pro_nombre', $this->proveedor]);

        return $dataProvider;
    }
}
