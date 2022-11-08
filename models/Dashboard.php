<?php

namespace app\models;

use Yii;
use yii\helpers\Html;


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
    //variables para la imagen
    public $archivo_imagen;
    public $lista_roles;
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
            [['dash_orden', 'dash_titulo', 'dash_img', 'dash_descripcion', 'dash_url', 'dash_estatus', 'dash_roles'], 'required'],
            [[ 'dash_estatus','dash_orden'], 'integer'],
            [['dash_titulo'], 'string', 'max' => 50],
            [['dash_img'], 'string', 'max' => 25],
            [['dash_descripcion', 'dash_roles'], 'string', 'max' => 255],
            [['dash_url'], 'string', 'max' => 100],
            //reglas nuevas de control
            [['dash_img'], 'unique'],
            [['dash_img'], 'match', 'pattern' => '/^[a-z]+[a-z0-9_]*$/i', 'message' => Yii::t('app', 'letra+caracter: minúsculas, sin espacios, sin acentos.')],
            [['dash_url'], 'match', 'pattern' => '/^\/[a-z]+\/[a-z]+$/i', 'message' => Yii::t('app', 'Debe escribir un formato de ruta: "/controller/action".')],
            [['archivo_imagen', 'lista_roles'], 'safe'],
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
            'dash_id' => Yii::t('app', 'Id'),
            'dash_titulo' => Yii::t('app', 'Título'),
            'dash_img' => Yii::t('app', 'Imagen'),
            'dash_descripcion' => Yii::t('app', 'Descripción'),
            'dash_url' => Yii::t('app', 'Url'),
            'dash_estatus' => Yii::t('app', 'Estatus'),
            'dash_roles' => Yii::t('app', 'Roles'),
            'archivo_imagen' => Yii::t('app', 'Imagen'),
            'lista_roles' => Yii::t('app', 'Roles'),
            'img' => Yii::t('app', 'Imagen'),
            'sta' => Yii::t('app', 'Estatus'),
        ];
    }

    //funciones nuevas
    public function getImg() {
        return Html::img(
            "/img/dashboard/{$this->dash_img}.png",
            ['alt' => Yii::t('app', $this->dash_titulo), 'style' => 'width: 70%;']
        );
    }
    
    public function getSta() {
        $texto = $this->dash_estatus == 1 ? 'Activo' : 'Inactivo';
        $color = $this->dash_estatus == 1 ? 'success' : 'default';
        return Html::button($texto, ['class' => "btn btn-{$color}", 'style' => 'width: 100%;']);
    }
}
