<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

class SeguridadUsuario extends Widget
{
    public $model;
    private $fk;
    private $id;

    public function init()
    {
        parent::init();

        //  $modelUser = $this->findModel();

        if ($this->model == null) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        } else if (User::hasRole(['Administrativo'])) {
            return $this->model->adm_fkuser == Yii::$app->user->id;
        }
    }

    public function run()
    {
        return /*$this->model->tra_fkuser == Yii::$app->user->id || */ Yii::$app->user->isSuperAdmin;
    }
}
