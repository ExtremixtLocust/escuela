<?php

namespace app\models;
//controlador de imagenes
use webvimark\modules\UserManagement\models\User;
use app\widgets\ImgController;

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
 * @property Usuario $mae_fkuser
 */
class Maestro extends \yii\db\ActiveRecord
{
    //gestor de imagen
    public $archivo_imagen;
    //contraseña
    public $contrasenia1;
    public $contrasenia2;
    //correo del usuario
    //se usa el correo que guarda el maestro
    //public $correo;

    //inicio de la clase
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
            [['mae_departamento_id', 'mae_nombre', 'mae_appaterno', 'mae_apmaterno', 'mae_rfc', 'mae_telefono', 'mae_direccion', 'mae_correo', /*clave del usuario*/ 'mae_fkuser'], 'required'],
            [['mae_departamento_id',  'mae_fkuser'], 'integer'],
            [['mae_nombre', 'mae_appaterno', 'mae_apmaterno', 'mae_rfc', 'mae_direccion', 'mae_correo'], 'string', 'max' => 255],
            [['mae_telefono'], 'string', 'max' => 15],
            [['mae_departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['mae_departamento_id' => 'dep_id']],
            //regla para cargar la llave foránea del usuario
            [['mae_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['mae_fkuser' => 'id']],
            //reglas nuevas de control para la imagen
            [['archivo_imagen'], 'safe'],
            [['archivo_imagen'], 'file', 'extensions' => 'png'],
            [['archivo_imagen'], 'file', 'maxSize' => '1000000'],
            //reglas de la contraseña
            [['contrasenia1', 'contrasenia2'], 'required', 'on' => 'insert'],
            [['contrasenia1', 'contrasenia2'], 'string', 'min' => 6, 'max' => 40],
            ['contrasenia2', 'compare', 'compareAttribute' => 'contrasenia1'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //añadimos departamentos al modelo presentable
            'departamento' => Yii::t('app', 'Departamento'),
            'mae_id' => Yii::t('app', 'Id'),
            'mae_departamento_id' => Yii::t('app', 'Departamento'),
            'mae_nombre' => Yii::t('app', 'Nombre'),
            'mae_appaterno' => Yii::t('app', 'Apellido Paterno'),
            'mae_apmaterno' => Yii::t('app', 'Apellido Materno'),
            'mae_rfc' => Yii::t('app', 'RFC'),
            'mae_telefono' => Yii::t('app', 'Teléfono'),
            'mae_direccion' => Yii::t('app', 'Dirección'),
            'mae_correo' => Yii::t('app', 'Correo'),
            'mae_fkuser' => Yii::t('app', 'Usuario'),
            //parámetros para guardar imágenes
            'archivo_imagen' => Yii::t('app', 'Imagen'),
            'img' => Yii::t('app', 'Imagen'),
            'contrasenia1' => Yii::t('app', 'Contraseña'),
            'contrasenia2' => Yii::t('app', 'Repetir Contraseña'),
            'correo' => Yii::t('app', 'Correo'),
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

    /**
     * Gets query for [[MaeUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    //metodo para obtener la relación con un usuario como tal (sin datos)
    public function getMaeUser()
    {
        return $this->hasOne(User::className(), ['id' => 'mae_fkuser']);
    }

    //creamos el método que nos devolverá el nombre del departamento traído de la BD
    public function getDepartamento()
    {
        return $this->maeDepartamento->dep_nombre;
    }

    //metodo creado para obtener el usuario
    public function getUser()
    {
        return $this->maeUser->id;
    }

    //funciones para buscar imagenes
    public function getImg()
    {
        //widget para buscar la imagen
        return ImgController::widget([
            'busqueda' => $this->mae_rfc,
            'rol' => 'maestro',
            'funcion' => 'get',
        ]);
    }
}