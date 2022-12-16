<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class ImgController extends Widget
{
    public $model;
    public $rol;
    //operacion
    public $funcion = null;
    //busqueda
    public $busqueda = null;

    //extensión de la imagen
    private $extension = 'png';
    //carpeta
    private $carpeta = null;
    //nombre que llevará la imagen
    private $nombreParaGuardar = null;
    //ruta de la imagen
    private $rutaParaGuardar;
    public function init()
    {
    }

    public function run()
    {
        //se comprueba que haya un rol
        $this->seleccionarRol();
        if ($this->funcion == 'save') {
            //se guarda la imagen
            $this->guardarImagen($this->model);
        } else if ($this->funcion == 'get') {
            return $this->getImg($this->rol, $this->busqueda);
        }
    }

    //metodo para guardar la imagen
    private function guardarImagen($model)
    {
        $model = $model;
        $objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            //se revisa el rol
            if ($this->rol == 'alumno') {
                $this->nombreParaGuardar = $model->alu_nocontrol;
            } else if ($this->rol == 'administrativo') {
                $this->nombreParaGuardar = $model->adm_rfc;
            } else if ($this->rol == 'maestro') {
                $this->nombreParaGuardar = $model->mae_rfc;
            }
            $this->rutaParaGuardar = Yii::$app->basePath . "/web/img/{$this->rol}/{$this->nombreParaGuardar}.{$this->extension}";
            $objeto_imagen->saveAs($this->rutaParaGuardar);
        }
    }

    private function getImg($rol, $nombre)
    {
        return Html::img(
            "/img/{$rol}/{$nombre}.png",
            ['alt' => Yii::t('app', $nombre), 'style' => 'width: 50%;']
        );
    }

    //metodo para comprobar que exista un rol
    private function seleccionarRol()
    {
        if ($this->rol == null) {
            throw new NotFoundHttpException(Yii::t('app', 'Ha ocurrido un error al guardar la imagen.'));
        }
    }
}