<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

class SeguridadUsuario extends Widget
{
    public $model;

    public function init()
    {
        parent::init();

        //  $modelUser = $this->findModel();

        if ($this->model == null) {
            throw new NotFoundHttpException(Yii::t('app', 'Seguridad de usuario.'));
        } /*else/* if (User::hasRole(['Administrativo'])) {
            return $this->model->adm_fkuser == Yii::$app->user->id;
        } else*/
    }

    public function run()
    {
        /*$this->model->tra_fkuser == Yii::$app->user->id || */
        if (Yii::$app->user->isSuperAdmin) {
            return true;
        }
        if (User::hasRole(['Trabajador'])) {
            if ($this->model->tra_fkuser == Yii::$app->user->id) {
                return true;
            }
        } else if (User::hasRole(['Administrativo'])) {
            if ($this->model->adm_fkuser == Yii::$app->user->id) {
                return true;
            } else {
                throw new NotFoundHttpException(Yii::t('app', 'Seguridad de usuario.'));
            }
        }
    }
}