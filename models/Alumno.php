<?php

namespace app\models;

use Yii;
use app\widgets\ImgController;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "alumno".
 *
 * @property int $alu_id Id
 * @property string $alu_nombre Nombre
 * @property string $alu_appaterno Apellido Paterno
 * @property string $alu_apmaterno Apellido Materno
 * @property int $alu_reticula_id Retícula
 * @property string $alu_nocontrol No de control
 * @property int $alu_semestre Semestre
 *
 * @property Reticula $aluReticula
 * @property Curso[] $cursos
 * @property Usuario $alu_fkuser
 */
class Alumno extends \yii\db\ActiveRecord
{
    public $archivo_imagen;
    public $contrasenia1;
    public $contrasenia2;
    public $correo;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alu_nombre', 'alu_appaterno', 'alu_apmaterno', 'alu_reticula_id', 'alu_nocontrol', 'alu_semestre', /*clave del usuario*/ 'alu_fkuser'], 'required'],
            [['alu_reticula_id', 'alu_semestre', 'alu_fkuser'], 'integer'],
            [['alu_nombre', 'alu_appaterno', 'alu_apmaterno', 'alu_nocontrol'], 'string', 'max' => 255],
            [['alu_reticula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reticula::className(), 'targetAttribute' => ['alu_reticula_id' => 'ret_id']],
            //regla para cargar la llave foránea del usuario
            [['alu_fkuser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['alu_fkuser' => 'id']],
            //reglas nuevas de control para la imagen
            [['archivo_imagen'], 'safe'],
            [['archivo_imagen'], 'file', 'extensions' => 'png'],
            [['archivo_imagen'], 'file', 'maxSize' => '1000000'],
            //reglas de la contraseña
            [['correo', 'contrasenia1', 'contrasenia2'], 'required', 'on' => 'insert'],
            [['contrasenia1', 'contrasenia2'], 'string', 'min' => 6, 'max' => 40],
            ['contrasenia2', 'compare', 'compareAttribute' => 'contrasenia1'],
            [['correo'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'alu_id' => Yii::t('app', 'Id'),
            'alu_nombre' => Yii::t('app', 'Nombre'),
            'alu_appaterno' => Yii::t('app', 'Apellido Paterno'),
            'alu_apmaterno' => Yii::t('app', 'Apellido Materno'),
            'alu_reticula_id' => Yii::t('app', 'Retícula'),
            'alu_nocontrol' => Yii::t('app', 'No de control'),
            'alu_semestre' => Yii::t('app', 'Semestre'),
            'alu_fkuser' => Yii::t('app', 'Usuario'),
            //añadimos el campo personalizado al idioma
            'reticula' => Yii::t('app', 'Retícula'),
            //parámetros para guardar imágenes
            'archivo_imagen' => Yii::t('app', 'Imagen'),
            'img' => Yii::t('app', 'Imagen'),
            'contrasenia1' => Yii::t('app', 'Contraseña'),
            'contrasenia2' => Yii::t('app', 'Repetir Contraseña'),
            'correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[AluReticula]].
     *
     * @return \yii\db\ActiveQuery
     */
    //metodo para obtener la relación como tal (sin datos)
    public function getAluReticula()
    {
        return $this->hasOne(Reticula::className(), ['ret_id' => 'alu_reticula_id']);
    }

    /**
     * Gets query for [[AluUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    //metodo para obtener la relación como tal (sin datos)
    public function getAluUser()
    {
        return $this->hasOne(User::className(), ['id' => 'alu_fkuser']);
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['cur_alumno_id' => 'alu_id']);
    }

    //Método creado para obtener el nombre de las retículas
    public function getReticula()
    {
        return $this->aluReticula->ret_carrera;
    }

    //metodo creado para obtener el usuario
    public function getUser()
    {
        return $this->aluUser->id;
    }

    //metodo creado para obtener el correo
    public function getEmail()
    {
        return $this->aluUser->email;
    }

    //funciones para buscar imagenes
    public function getImg()
    {
        //codigo sin widget
        /*return Html::img(
            "/img/alumno/{$this->alu_nocontrol}.png",
            ['alt' => Yii::t('app', $this->alu_nocontrol), 'style' => 'width: 50%;']
        );*/

        //widget para buscar la imagen
        return ImgController::widget([
            'busqueda' => $this->alu_nocontrol,
            'rol' => 'alumno',
            'funcion' => 'get',
        ]);
    }
}