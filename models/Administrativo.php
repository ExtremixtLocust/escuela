<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "administrativo".
 *
 * @property int $adm_id Id
 * @property int $adm_departamento_id Id departamento
 * @property string $adm_nombre Nombre
 * @property string $adm_appaterno Apellido Paterno
 * @property string $adm_apmaterno Apellido Materno
 * @property string $adm_telefono Teléfono
 * @property string $adm_direccion Dirección
 * @property string $adm_rfc RFC
 * @property string $adm_correo Correo
 *
 * @property Departamento $admDepartamento
 */
class Administrativo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administrativo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adm_departamento_id', 'adm_nombre', 'adm_appaterno', 'adm_apmaterno', 'adm_telefono', 'adm_direccion', 'adm_rfc', 'adm_correo'], 'required'],
            [['adm_departamento_id'], 'integer'],
            [['adm_nombre', 'adm_appaterno', 'adm_apmaterno', 'adm_telefono', 'adm_direccion', 'adm_rfc', 'adm_correo'], 'string', 'max' => 255],
            [['adm_departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['adm_departamento_id' => 'dep_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adm_id' => Yii::t('app', 'Id'),
            //añadimos el campo personalizado al idioma
            'departamento' => Yii::t('app', 'Departamento'),
            'adm_departamento_id' => Yii::t('app', 'Departamento'),
            'adm_nombre' => Yii::t('app', 'Nombre'),
            'adm_appaterno' => Yii::t('app', 'Apellido Paterno'),
            'adm_apmaterno' => Yii::t('app', 'Apellido Materno'),
            'adm_telefono' => Yii::t('app', 'Teléfono'),
            'adm_direccion' => Yii::t('app', 'Dirección'),
            'adm_rfc' => Yii::t('app', 'RFC'),
            'adm_correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[AdmDepartamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['dep_id' => 'adm_departamento_id']);
    }

    //creamos el método que traerá el nombre de los departamentos
    public function getDepartamento()
    {
        return $this->admDepartamento->dep_nombre;
    }
}
