<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maestro".
 *
 * @property int $mae_id Id
 * @property int $mae_departamento_id Id departamento
 * @property string $mae_nombre Nombre
 * @property string $mae_appaterno Apellido Paterno
 * @property string $mae_apmaterno Apellido Materno
 * @property string $mae_rfc RFC
 * @property string $mae_telefono Teléfono
 * @property string $mae_direccion Direccion
 * @property string $mae_correo Correo
 *
 * @property Grupo[] $grupos
 * @property Departamento $maeDepartamento
 */
class Maestro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maestro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mae_departamento_id', 'mae_nombre', 'mae_appaterno', 'mae_apmaterno', 'mae_rfc', 'mae_telefono', 'mae_direccion', 'mae_correo'], 'required'],
            [['mae_departamento_id'], 'integer'],
            [['mae_nombre', 'mae_appaterno', 'mae_apmaterno', 'mae_rfc', 'mae_direccion', 'mae_correo'], 'string', 'max' => 255],
            [['mae_telefono'], 'string', 'max' => 15],
            [['mae_departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['mae_departamento_id' => 'dep_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mae_id' => Yii::t('app', 'Id'),
            'mae_departamento_id' => Yii::t('app', 'Id departamento'),
            'mae_nombre' => Yii::t('app', 'Nombre'),
            'mae_appaterno' => Yii::t('app', 'Apellido Paterno'),
            'mae_apmaterno' => Yii::t('app', 'Apellido Materno'),
            'mae_rfc' => Yii::t('app', 'RFC'),
            'mae_telefono' => Yii::t('app', 'Teléfono'),
            'mae_direccion' => Yii::t('app', 'Direccion'),
            'mae_correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['gru_maestro_id' => 'mae_id']);
    }

    /**
     * Gets query for [[MaeDepartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaeDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['dep_id' => 'mae_departamento_id']);
    }
}
