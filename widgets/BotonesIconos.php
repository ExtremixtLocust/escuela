<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class BotonesIconos extends Widget{

        public function init()
    {

    }

    
    public function run()
    {
        //return Html::img("/img/{$this->imagen}", $this->options);
        return Html::a(Yii::t('app', 'Centro de Servicios'), 'http://itvillahermosa.edu.mx/site/sys.jsp?view=alumnos', ['class' => 'btn btn-primary']);
    }
}


