<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class twitter extends Widget{

        public function init()
    {

    }

    
    public function run()
    {
        //return Html::img("/img/{$this->imagen}", $this->options);
        //return Html::a(Yii::t('app', 'TWITTER'), 'https://www.twitter.com/', ['class' => 'twitter']);
        $img = Html::a('<span style="font-size: 8rem; color:#212529;"<i class="bi bi-twitter"></i></span>', 'https://www.twitter.com/', ['class' => 'twitter']);
        $boton = <<< HTML5
            {$img}
        HTML5;
        return Html::a($boton);

    }
}


