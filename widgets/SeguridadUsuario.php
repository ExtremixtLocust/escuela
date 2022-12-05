<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\web\NotFoundHttpException;

class SeguridadUsuario extends Widget
{
    public $model;
    public $modelUser;
    public $idUser;

    public function init()
    {
        parent::init();

        $modelUser = $this->findModel();

        if ($modelUser->tra_fkuser == Yii::$app->user->id || Yii::$app->user->isSuperAdmin){
            return $this->render('view', [
                'model' => $modelUser,
            ]); 
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));

    }

    public function run()
    {
        return $this->render('view', [
            
        ]);
    }
}