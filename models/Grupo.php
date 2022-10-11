<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property int $gru_id Id
 * @property int $gru_materia_id Id materia
 * @property int $gru_maestro_id Id maestro
 * @property int $gru_aula_id Id aula
 *
 * @property Curso[] $cursos
 * @property Aula $gruAula
 * @property Maestro $gruMaestro
 * @property Materia $gruMateria
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gru_materia_id', 'gru_maestro_id', 'gru_aula_id'], 'required'],
            [['gru_materia_id', 'gru_maestro_id', 'gru_aula_id'], 'integer'],
            [['gru_aula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['gru_aula_id' => 'aul_id']],
            [['gru_maestro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Maestro::className(), 'targetAttribute' => ['gru_maestro_id' => 'mae_id']],
            [['gru_materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['gru_materia_id' => 'mat_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gru_id' => Yii::t('app', 'Id'),
            'gru_materia_id' => Yii::t('app', 'Materia'),
            'gru_maestro_id' => Yii::t('app', 'Maestro'),
            'gru_aula_id' => Yii::t('app', 'Aula'),
            'materia' => Yii::t('app', 'Materia'),
            'maestro' => Yii::t('app', 'Maestro'),
            'aula' => Yii::t('app', 'Aula'),
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['cur_grupo_id' => 'gru_id']);
    }

    /**
     * Gets query for [[GruAula]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruAula()
    {
        return $this->hasOne(Aula::className(), ['aul_id' => 'gru_aula_id']);
    }

    /**
     * Gets query for [[GruMaestro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruMaestro()
    {
        return $this->hasOne(Maestro::className(), ['mae_id' => 'gru_maestro_id']);
    }

    /**
     * Gets query for [[GruMateria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGruMateria()
    {
        return $this->hasOne(Materia::className(), ['mat_id' => 'gru_materia_id']);
    }

    //obtenemos la materia
    public function getMateria()
    {
        return $this->gruMateria->mat_nombre;
    }

    //obtenemos el nombre del maestro
    public function getMaestro()
    {
        $nombre = $this->gruMaestro->mae_nombre;
        $nombre .= ' ';
        $nombre .=$this->gruMaestro->mae_appaterno;
        return $nombre;
    }

    //obtenemos el número de aula
    public function getAula()
    {
        return $this->gruAula->aul_numero;
    }
}
