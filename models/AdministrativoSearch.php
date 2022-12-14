<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Administrativo;

/**
 * AdministrativoSearch represents the model behind the search form of `app\models\Administrativo`.
 */
class AdministrativoSearch extends Administrativo
{

    //variable para añadir departemento al search
    public $departamento;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //se añade la nueva variable para que sea segura
            [['adm_id', 'adm_departamento_id'], 'integer'],
            [['adm_nombre', 'adm_appaterno', 'adm_apmaterno', 'adm_telefono', 'adm_direccion', 'adm_rfc', 'adm_correo' , 'departamento'], 'safe'],
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
        //$query = Administrativo::find();
        $query = Administrativo::find()->joinWith(['admDepartamento']);

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
                'adm_nombre',
                'adm_appaterno',
                'adm_apmaterno',
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
            'adm_id' => $this->adm_id,
            'adm_departamento_id' => $this->adm_departamento_id,
        ]);

        $query->andFilterWhere(['like', 'adm_nombre', $this->adm_nombre])
            ->andFilterWhere(['like', 'adm_appaterno', $this->adm_appaterno])
            ->andFilterWhere(['like', 'adm_apmaterno', $this->adm_apmaterno])
            ->andFilterWhere(['like', 'adm_telefono', $this->adm_telefono])
            ->andFilterWhere(['like', 'adm_direccion', $this->adm_direccion])
            ->andFilterWhere(['like', 'adm_rfc', $this->adm_rfc])
            ->andFilterWhere(['like', 'adm_correo', $this->adm_correo])
            //añadimos el departamento a los filtros
            ->andFilterWhere(['like', 'dep_nombre', $this->departamento]);

        return $dataProvider;
    }
}
