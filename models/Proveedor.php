<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $pro_id Id
 * @property string $pro_nombre Nombre
 * @property string $pro_direccion Direccion
 * @property string $pro_correo Correo
 * @property string $pro_telefono Teléfono
 *
 * @property Departamento[] $departamentos
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_nombre', 'pro_fechaAsoc','pro_direccion', 'pro_correo', 'pro_telefono'], 'required'],
            [['pro_nombre', 'pro_fechaAsoc','pro_direccion', 'pro_correo'], 'string', 'max' => 255],
            [['pro_telefono'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => Yii::t('app', 'Id'),
            'pro_nombre' => Yii::t('app', 'Nombre'),
            'pro_fechaAsoc' => Yii::t('app', 'Fecha de Asociación'),
            'pro_direccion' => Yii::t('app', 'Direccion'),
            'pro_correo' => Yii::t('app', 'Correo'),
            'pro_telefono' => Yii::t('app', 'Teléfono'),
        ];
    }

    /**
     * Gets query for [[Departamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamento::className(), ['dep_proveedor_id' => 'pro_id']);
    }
}
