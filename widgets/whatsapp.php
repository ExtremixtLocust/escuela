<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class whatsapp extends Widget{

        public function init()
    {
        
    }

    
    public function run()
    {
        //return Html::img("/img/{$this->imagen}", $this->options);
        //return Html::a(Yii::t('app', 'FACEBOOK'), 'https://www.facebook.com/', ['class' => 'facebook']);
        //return Html::a('<i class="bi bi-facebook style="font-size: 2rem; color: cornflowerblue;""></i>', 'https://www.facebook.com/', ['class' => 'facebook']);
        $img = Html::a('<span style="font-size: 8rem; color:#212529;"<i class="bi bi-whatsapp"></i></span>', 'https://web.whatsapp.com/', ['class' => 'whatsapp']);
        $boton = <<< HTML5
            {$img}
        HTML5;
        return Html::a($boton);
    }   
}