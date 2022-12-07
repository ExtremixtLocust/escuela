<?php

namespace app\controllers;

use Yii;
use app\models\Alumno;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\AlumnoSearch;
use app\widgets\ImgController;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

/**
 * AlumnoController implements the CRUD actions for Alumno model.
 */
class AlumnoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Alumno models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumno model.
     * @param int $alu_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($alu_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($alu_id),
        ]);
    }

    /**
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($kfuser = null)
    {
        $model = new Alumno();

        if ($this->request->isPost) {
            /*
            //codigo anterior
            if ($model->load($this->request->post()) && $modeluser->load($this->request->post())) {


                $avatar = \yii\web\UploadedFile::getInstance($model, 'file');
                if (!is_null($avatar)) {
                    $name = explode('.', $avatar->name);
                    $ext = end($name);
                    $model->avatar = Yii::$app->security->generateRandomString() . ".{$ext}";
                    $resource = Yii::$app->basePath . '@web/img/';    //<--Recuerda que "avatar/" es el nombre de la carpeta donde se guardan las imagenes
                    $path = $resource . $model->avatar;
                    if ($avatar->saveAs($path)) {
                        if ($modeluser->save()) {
                            $model->fkuser = $modeluser->alu_id;
                            $modeluser::assignRole($modeluser->alu_id, 'Alumno');
                            if ($model->save()) {
                                return $this->redirect(['view', 'alu_id' => $model->alu_id]);
                            }
                        }
                    }
                }
            
            }*/
            if ($model->load($this->request->post())) {
                $this->guardarImagen($model);
                $user = new User([
                    'username' => $model->alu_nocontrol,
                    'password_hash' => Yii::$app->getSecurity()->generatePasswordHash($model->contrasenia1),
                    'status' => 1,
                    'email' => $model->correo,
                    'email_confirmed' => 1,
                ]);
                if ($user->save()) {
                    User::assignRole($user->id, 'Alumno');
                    $model->alu_fkuser = $user->id;
                    if ($model->save()) {
                        return $this->redirect(['view', 'alu_id' => $model->alu_id]);
                    }
                }
                echo "<pre>";
                //var_dump($model->errors);
                echo "ha ocurrido el error despues de guardar la foto";
                echo "</pre>";
                die;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            //'modeluser' => $modeluser,
            'kfuser' => $kfuser,
        ]);
    }

    /*if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'alu_id' => $model->alu_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
    //}

    /**
     * Updates an existing Alumno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $alu_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($alu_id)
    {
        $model = $this->findModel($alu_id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $this->guardarImagen($model);
            if ($model->save()) {
                $user = $model->aluUser;
                $bandera = false;
                if ($model->contrasenia1 != '******') {
                    $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->contrasenia1);
                    $bandera = true;
                }
                if ($user->email != $model->correo) {
                    $user->email = $model->correo;
                    $bandera = true;
                }
                if ($bandera) {
                    $user->save();
                }
                return $this->redirect(['view', 'alu_id' => $model->alu_id]);
            }
        }
        $model->archivo_imagen = "/img/alumno/{$model->alu_nocontrol}.png";

        return $this->render('update', [
            'model' => $model,
            'kfuser' => '',
        ]);
    }

    /**
     * Deletes an existing Alumno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $alu_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($alu_id)
    {
        $this->findModel($alu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $alu_id Id
     * @return Alumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($alu_id)
    {
        if (($model = Alumno::findOne(['alu_id' => $alu_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    //método creado para
    //guardar la imagen
    private function guardarImagen($model)
    {
        /*ImgController::widget([
            'model' => $model,
            'rol' => 'Alumno',
        ]);*/

        //codigo sin widget
        $objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $nombre = $model->alu_nocontrol; //reset(explode(".", $objeto_imagen->name));
            $extension = 'png'; //end((explode(".", $objeto_imagen->name)));
            $destino = Yii::$app->basePath . "/web/img/alumno/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }
    }
}