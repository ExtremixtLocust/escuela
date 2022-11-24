<?php

namespace app\widgetsPersonalizados;

use Yii;

use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Reticula;
use yii\grid\ActionColumn;
use webvimark\modules\UserManagement\models\User;



class TablaConPermisos extends Widget
{
    public $botonera = [];


    public function init()
    {
        parent::init();
        if ($this->botonera === null) {
            $this->botonera = ['Hello World'];
        }
    }

    public function run()
    {
        //return Html::encode($this->message);
        $this->botonera = [
            'update' => User::hasRole(['Administrativo']),
            //\Yii::$app->user->can('update')
            'delete' => User::hasRole(['Administrativo']),
        ];
        return $this->botonera;
    }
}
