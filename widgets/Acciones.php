<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use app\widgets\MiActionColumn;
use webvimark\modules\UserManagement\models\User;

class Acciones extends Widget
{

    public static function botones($id)
    {
        return [
            'class' => MiActionColumn::className(),
            'urlCreator' => function ($action, $model, $key, $index, $column) use ($id) {
                return Url::toRoute([$action, $id => $model->$id]);
            },
            //sentencias para que solo administrativos
            //puedan editar y borrar
            'visibleButtons' => [
                'update' => User::hasRole(['Administrativo']),
                //\Yii::$app->user->can('update')
                'delete' => User::hasRole(['Administrativo']),
            ],
            //contenido centrado
            'contentOptions' => function ($model, $key, $index, $column) {
                return ['style' => 'text-align:center'];
            },
        ];
    }
}