<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dashboard;

/**
 * DashboardSearch represents the model behind the search form of `app\models\Dashboard`.
 */
class DashboardSearch extends Dashboard
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dash_id', 'dash_estatus'], 'integer'],
            [['dash_titulo', 'dash_img', 'dash_descripcion', 'dash_url', 'dash_roles'], 'safe'],
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
        $query = Dashboard::find();

        //if para que el superadmin pueda ver el dashboard
        if (!Yii::$app->user->isSuperAdmin) {
            //Filtrando los botones activos con "das_estatus"
            $query = $query->where(['dash_estatus' => 1]);
            //Filtrando los botones por roles con "das_roles"
            $roles = Yii::$app->user->identity->roles;
            foreach ($roles as $rol) {
                $query = $query->andWhere(['like', 'dash_roles', $rol->name]);
            }
            //Ordenando los botones con "das_orden"
            $query = $query->orderBy(['dash_orden' => SORT_ASC]);
        }

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
            'dash_id' => $this->dash_id,
            'dash_estatus' => $this->dash_estatus,
        ]);

        $query->andFilterWhere(['like', 'dash_titulo', $this->dash_titulo])
            ->andFilterWhere(['like', 'dash_img', $this->dash_img])
            ->andFilterWhere(['like', 'dash_descripcion', $this->dash_descripcion])
            ->andFilterWhere(['like', 'dash_url', $this->dash_url])
            ->andFilterWhere(['like', 'dash_roles', $this->dash_roles]);

        return $dataProvider;
    }
}
