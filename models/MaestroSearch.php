<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maestro;

/**
 * MaestroSearch represents the model behind the search form of `app\models\Maestro`.
 */
class MaestroSearch extends Maestro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mae_id', 'mae_departamento_id'], 'integer'],
            [['mae_nombre', 'mae_appaterno', 'mae_apmaterno', 'mae_rfc', 'mae_telefono', 'mae_direccion', 'mae_correo'], 'safe'],
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
        $query = Maestro::find();

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
            'mae_id' => $this->mae_id,
            'mae_departamento_id' => $this->mae_departamento_id,
        ]);

        $query->andFilterWhere(['like', 'mae_nombre', $this->mae_nombre])
            ->andFilterWhere(['like', 'mae_appaterno', $this->mae_appaterno])
            ->andFilterWhere(['like', 'mae_apmaterno', $this->mae_apmaterno])
            ->andFilterWhere(['like', 'mae_rfc', $this->mae_rfc])
            ->andFilterWhere(['like', 'mae_telefono', $this->mae_telefono])
            ->andFilterWhere(['like', 'mae_direccion', $this->mae_direccion])
            ->andFilterWhere(['like', 'mae_correo', $this->mae_correo]);

        return $dataProvider;
    }
}
