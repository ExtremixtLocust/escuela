<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\web\UploadedFile;

class ImgController extends Widget
{
    public $model;
    public $rol;
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
            }
            $extension = 'png';
            $destino = Yii::$app->basePath . "/web/img/{$carpeta}/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }
    }
}
