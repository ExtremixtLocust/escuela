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
        return Html::a(Yii::t('app', 'TWITTER'), 'https://www.twitter.com/', ['class' => 'twitter']);

    }
}


