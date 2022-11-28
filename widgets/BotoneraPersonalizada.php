<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class BotoneraPersonalizada extends Widget
{
    public $imagen;
    public $titulo;
    public $options;
    //tipo de boton
    public $type;
    public $class;

    public function init()
    {
        parent::init();
        if ($this->type === null){
            $this->class = 'botoneraPersonalizada btn btn-primary';
        }else if($this->type === 'view'){
            $this->class = 'botoneraPersonalizada btn btn-info';
        }else if($this->type === 'update'){
            $this->class = 'botoneraPersonalizada btn btn-warning';
        }else if($this->type === 'delete'){
            $this->class = 'botoneraPersonalizada btn btn-danger';
        }

        if ($this->options === null) {
            /*  Html::addCssClass($this->options, ['widget' => 'zoomimagen']); */
            $this->options = ['alt' => Yii::t('app', $this->titulo), 'class' =>  'botoneraPersonalizada'];
        }

    }

    public function run()
    {
        //return Html::img("/img/{$this->imagen}", $this->options);
        return $this->class;
    }
}
