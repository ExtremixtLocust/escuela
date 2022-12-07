<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class ImgController extends Widget
{
    public $model;
    public $rol;

    private $nombreParaGuardar;
    private $rutaParaGuardar;
    public function init()
    {
    }

    public function run()
    {
        $model = $this->model;
        $objeto_imagen = $this->objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $carpeta = null;
            $nombre = null;
            if ($this->rol == 'Alumno') {
                $nombre = $model->alu_nocontrol;
                $carpeta = 'alumno';
                echo "<pre>";
                var_dump($model->errors);
                echo "</pre>";
                die;
            } else if ($this->rol == 'Administrativo') {
                $nombre = $model->adm_nocontrol;
                $carpeta = 'administrativo';
            }
            $extension = 'png';
            $destino = Yii::$app->basePath . "/web/img/{$carpeta}/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }
    }

    private function guardarImagen()
    {
        $model = $this->model;
        $objeto_imagen = $this->objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $carpeta = null;
            $nombre = null;
            if ($this->rol == 'Alumno') {
                $nombre = $model->alu_nocontrol;
                $carpeta = 'alumno';
                echo "<pre>";
                var_dump($model->errors);
                echo "</pre>";
                die;
            } else if ($this->rol == 'Administrativo') {
                $nombre = $model->adm_nocontrol;
                $carpeta = 'administrativo';
            }
            $extension = 'png';
            $destino = Yii::$app->basePath . "/web/img/{$carpeta}/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }
    }

    private function seleccionarRol()
    {
        if ($this->rol == null) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}