<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property int $inv_id Id
 * @property string $inv_nombre Nombre del artículo
 * @property string $inv_clave Clave
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inv_nombre', 'inv_clave'], 'required'],
            [['inv_nombre', 'inv_clave'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inv_id' => Yii::t('app', 'Id'),
            'inv_nombre' => Yii::t('app', 'Nombre del artículo'),
            'inv_clave' => Yii::t('app', 'Clave'),
        ];
    }
}
