<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $cur_alumno_id Id alumno
 * @property int $cur_grupo_id Id carrera
 *
 * @property Alumno $curAlumno
 * @property Grupo $curGrupo
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cur_alumno_id', 'cur_grupo_id'], 'required'],
            [['cur_alumno_id', 'cur_grupo_id'], 'integer'],
            [['cur_alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['cur_alumno_id' => 'alu_id']],
            [['cur_grupo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['cur_grupo_id' => 'gru_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cur_alumno_id' => Yii::t('app', 'Id alumno'),
            'cur_grupo_id' => Yii::t('app', 'Id carrera'),
        ];
    }

    /**
     * Gets query for [[CurAlumno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurAlumno()
    {
        return $this->hasOne(Alumno::className(), ['alu_id' => 'cur_alumno_id']);
    }

    /**
     * Gets query for [[CurGrupo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurGrupo()
    {
        return $this->hasOne(Grupo::className(), ['gru_id' => 'cur_grupo_id']);
    }
}
