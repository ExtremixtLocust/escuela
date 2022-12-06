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
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        } /*else/* if (User::hasRole(['Administrativo'])) {
            return $this->model->adm_fkuser == Yii::$app->user->id;
        } else*/
    }

    public function run()
    {
        /*$this->model->tra_fkuser == Yii::$app->user->id || */
        if (User::hasRole(['Trabajador']) || Yii::$app->user->isSuperAdmin) {
            if ($this->model->tra_fkuser == Yii::$app->user->id) {
                return true;
            }
        }
    }
}
