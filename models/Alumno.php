<?php

namespace app\models;

use yii\helpers\Html;
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
 * @property string $alu_img Imagen
 *
 * @property Reticula $aluReticula
 * @property Curso[] $cursos
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $archivo_imagen;

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
            [['alu_nombre', 'alu_appaterno', 'alu_apmaterno', 'alu_reticula_id', 'alu_nocontrol', 'alu_semestre', 'alu_img'], 'required'],
            [['alu_reticula_id', 'alu_semestre'], 'integer'],
            [['alu_nombre', 'alu_appaterno', 'alu_apmaterno', 'alu_nocontrol'], 'string', 'max' => 255],
            [['alu_reticula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reticula::className(), 'targetAttribute' => ['alu_reticula_id' => 'ret_id']],
            //reglas nuevas de control
            [['alu_img'], 'string', 'max' => 25],
            [['alu_img'], 'unique'],
            [['archivo_imagen'], 'safe'],
            [['archivo_imagen'], 'file', 'extensions' => 'png'],
            [['archivo_imagen'], 'file', 'maxSize' => '1000000'],
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
            //parámetros para guardar imágenes
            'archivo_imagen' => Yii::t('app', 'Imagen'),
            'alu_img' => Yii::t('app', 'Imagen'),
            'img' => Yii::t('app', 'Imagen'),
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

    //funciones para buscar imagenes
    public function getImg() {
        return Html::img(
            "/img/alumno/{$this->alu_img}.png",
            ['alt' => Yii::t('app', $this->alu_nocontrol), 'style' => 'width: 70%;']
        );
    }
}
