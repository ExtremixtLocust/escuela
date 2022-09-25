<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajador".
 *
 * @property int $tra_id Id
 * @property int $tra_departamento_id Id departamento
 * @property string $tra_nombre Nombre
 * @property string $tra_appaterno Apellido Paterno
 * @property string $tra_apmaterno Apellido Materno
 * @property string $tra_rfc RFC
 * @property string $tra_direccion Direccion
 * @property string $tra_telefono Teléfono
 * @property string $tra_correo Correo
 *
 * @property Departamento $traDepartamento
 */
class Trabajador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trabajador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_departamento_id', 'tra_nombre', 'tra_appaterno', 'tra_apmaterno', 'tra_rfc', 'tra_direccion', 'tra_telefono', 'tra_correo'], 'required'],
            [['tra_departamento_id'], 'integer'],
            [['tra_nombre', 'tra_appaterno', 'tra_apmaterno', 'tra_rfc', 'tra_direccion', 'tra_correo'], 'string', 'max' => 255],
            [['tra_telefono'], 'string', 'max' => 15],
            [['tra_departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['tra_departamento_id' => 'dep_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tra_id' => Yii::t('app', 'Id'),
            'tra_departamento_id' => Yii::t('app', 'Id departamento'),
            'tra_nombre' => Yii::t('app', 'Nombre'),
            'tra_appaterno' => Yii::t('app', 'Apellido Paterno'),
            'tra_apmaterno' => Yii::t('app', 'Apellido Materno'),
            'tra_rfc' => Yii::t('app', 'RFC'),
            'tra_direccion' => Yii::t('app', 'Direccion'),
            'tra_telefono' => Yii::t('app', 'Teléfono'),
            'tra_correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[TraDepartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['dep_id' => 'tra_departamento_id']);
    }
}
