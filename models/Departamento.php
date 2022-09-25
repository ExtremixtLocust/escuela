<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $dep_id Id
 * @property int $dep_proveedor_id Id proveedor
 * @property string $dep_nombre Nombre del departamento
 *
 * @property Administrativo[] $administrativos
 * @property Proveedor $depProveedor
 * @property Maestro[] $maestros
 * @property Trabajador[] $trabajadors
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dep_proveedor_id', 'dep_nombre'], 'required'],
            [['dep_proveedor_id'], 'integer'],
            [['dep_nombre'], 'string', 'max' => 255],
            [['dep_proveedor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['dep_proveedor_id' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dep_id' => Yii::t('app', 'Id'),
            'dep_proveedor_id' => Yii::t('app', 'Id proveedor'),
            'dep_nombre' => Yii::t('app', 'Nombre del departamento'),
        ];
    }

    /**
     * Gets query for [[Administrativos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrativos()
    {
        return $this->hasMany(Administrativo::className(), ['adm_departamento_id' => 'dep_id']);
    }

    /**
     * Gets query for [[DepProveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepProveedor()
    {
        return $this->hasOne(Proveedor::className(), ['pro_id' => 'dep_proveedor_id']);
    }

    /**
     * Gets query for [[Maestros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaestros()
    {
        return $this->hasMany(Maestro::className(), ['mae_departamento_id' => 'dep_id']);
    }

    /**
     * Gets query for [[Trabajadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrabajadors()
    {
        return $this->hasMany(Trabajador::className(), ['tra_departamento_id' => 'dep_id']);
    }
}
