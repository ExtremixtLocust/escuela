<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reticula".
 *
 * @property int $ret_id Id
 * @property string $ret_carrera Carrera
 *
 * @property Alumno[] $alumnos
 * @property Carga[] $cargas
 */
class Reticula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reticula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ret_carrera'], 'required'],
            [['ret_carrera'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ret_id' => Yii::t('app', 'Id'),
            'ret_carrera' => Yii::t('app', 'Carrera'),
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['alu_reticula_id' => 'ret_id']);
    }

    /**
     * Gets query for [[Cargas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargas()
    {
        return $this->hasMany(Carga::className(), ['car_reticula_id' => 'ret_id']);
    }
}
