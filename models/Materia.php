<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property int $mat_id Id
 * @property string $mat_nombre Nombre
 *
 * @property Carga[] $cargas
 * @property Grupo[] $grupos
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mat_nombre'], 'required'],
            [['mat_nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mat_id' => Yii::t('app', 'Id'),
            'mat_nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[Cargas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargas()
    {
        return $this->hasMany(Carga::className(), ['car_materia_id' => 'mat_id']);
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['gru_materia_id' => 'mat_id']);
    }
}
