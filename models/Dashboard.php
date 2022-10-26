<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dashboard".
 *
 * @property int $dash_id Id
 * @property string $dash_titulo Título
 * @property string $dash_img Imagen
 * @property string $dash_descripcion Descripción
 * @property string $dash_url Url
 * @property int $dash_estatus Estatus
 * @property string $dash_roles Roles
 */
class Dashboard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dashboard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dash_id', 'dash_titulo', 'dash_img', 'dash_descripcion', 'dash_url', 'dash_estatus', 'dash_roles'], 'required'],
            [['dash_id', 'dash_estatus'], 'integer'],
            [['dash_titulo'], 'string', 'max' => 50],
            [['dash_img'], 'string', 'max' => 25],
            [['dash_descripcion', 'dash_roles'], 'string', 'max' => 255],
            [['dash_url'], 'string', 'max' => 100],
            [['dash_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dash_id' => Yii::t('app', 'Id'),
            'dash_titulo' => Yii::t('app', 'Título'),
            'dash_img' => Yii::t('app', 'Imagen'),
            'dash_descripcion' => Yii::t('app', 'Descripción'),
            'dash_url' => Yii::t('app', 'Url'),
            'dash_estatus' => Yii::t('app', 'Estatus'),
            'dash_roles' => Yii::t('app', 'Roles'),
        ];
    }
}