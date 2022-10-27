<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property int $alu_id Id
 * @property string $alu_nombre Nombre
 * @property string $alu_appaterno Apellido Paterno
 * @property string $alu_apmaterno Apellido Materno
 * @property int $alu_reticula_id Retícula
 * @property string $alu_nocontrol No de control
 * @property int $alu_semestre Semestre
 *
 * @property Reticula $aluReticula
 * @property Curso[] $cursos
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alu_nombre', 'alu_appaterno', 'alu_apmaterno', 'alu_reticula_id', 'alu_nocontrol', 'alu_semestre'], 'required'],
            [['alu_reticula_id', 'alu_semestre'], 'integer'],
            [['alu_nombre', 'alu_appaterno', 'alu_apmaterno', 'alu_nocontrol'], 'string', 'max' => 255],
            [['alu_reticula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reticula::className(), 'targetAttribute' => ['alu_reticula_id' => 'ret_id']],
            [['file'], 'file', 'extensions' => 'png', 'maxFiles' => '1'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'alu_id' => Yii::t('app', 'Id'),
            'alu_nombre' => Yii::t('app', 'Nombre'),
            'alu_appaterno' => Yii::t('app', 'Apellido Paterno'),
            'alu_apmaterno' => Yii::t('app', 'Apellido Materno'),
            'alu_reticula_id' => Yii::t('app', 'Retícula'),
            'alu_nocontrol' => Yii::t('app', 'No de control'),
            'alu_semestre' => Yii::t('app', 'Semestre'),
            //añadimos el campo personalizado al idioma
            'reticula' => Yii::t('app', 'Retícula'),

            'file' => 'Foto',
        ];
    }

    /**
     * Gets query for [[AluReticula]].
     *
     * @return \yii\db\ActiveQuery
     */
    //metodo para obtener la relación como tal (sin datos)
    public function getAluReticula()
    {
        return $this->hasOne(Reticula::className(), ['ret_id' => 'alu_reticula_id']);
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['cur_alumno_id' => 'alu_id']);
    }

    //Método creado para obtener el nombre de las retículas
    public function getReticula()
    {
        return $this->aluReticula->ret_carrera;
    }
}
