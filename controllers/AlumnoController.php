<?php

namespace app\controllers;

use Yii;
use app\models\Alumno;
use yii\web\Controller;
use app\models\AlumnoSearch;
use app\widgets\ImgController;
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
    public function actionCreate($fkUser = null)
    {
        $model = new Alumno();

        if ($this->request->isPost) {

            //controles para contraseña y datos
            //controles para contraseña y datos
            if ($model->load($this->request->post())) {
                //se guarda la imagen
                $this->guardarImagen($model);
                //se crear el usuario que puede iniciar sesión
                $user = new User([
                    'username' => $model->alu_nocontrol,
                    'password_hash' => Yii::$app->getSecurity()->generatePasswordHash($model->contrasenia1),
                    'status' => 1,
                    'email' => $model->correo,
                    'email_confirmed' => 1,
                ]);
                //se comprueba si se ha guardado el usuario
                //que inicia sesión
                if ($user->save()) {
                    //se asigna el rol
                    User::assignRole($user->id, 'Alumno');
                    //se asigna el usuario al modelo maestro
                    $model->alu_fkuser = $user->id;
                    //se comprueba que se haya guardado
                    //el nuevo maestro
                    if ($model->save()) {
                        //si todo sale bien, se muestra el view
                        return $this->redirect(['view', 'alu_id' => $model->alu_id]);
                    }
                }
            }
            //si desde el principio no viene guardado
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            //'modeluser' => $modeluser,
            'fkUser' => $fkUser,
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

        //se comprueba que se haya guardado
        if ($this->request->isPost && $model->load($this->request->post())) {
            //se guarda la imagen
            $this->guardarImagen($model);
            if ($model->save()) {
                //se identifica el usuario
                //que inicia sesion
                $user = $model->aluUser;
                //se crea una bandera para cambio de correo y contraseña
                $bandera = false;
                //se revisa si la contraseña ha cambiado en el form
                if ($model->contrasenia1 != '******') {
                    //se guarda la contraseña haseada
                    $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->contrasenia1);
                    $bandera = true;
                }
                //se verifica si el correo del ususario
                if ($user->email != $model->correo) {
                    $user->email = $model->correo;
                    $bandera = true;
                }
                //se revisa bandera
                if ($bandera) {
                    $user->save();
                }
                //se retorna a la vista
                return $this->redirect(['view', 'alu_id' => $model->alu_id]);
            }
        }
        //imagen
        $model->archivo_imagen = "/img/alumno/{$model->alu_nocontrol}.png";

        return $this->render('update', [
            'model' => $model,
            'fkuser' => '',
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
        //widget para guardar la imagen
        ImgController::widget([
            'model' => $model,
            'rol' => 'alumno',
            'funcion' => 'save',
        ]);

        //codigo sin widget
        /*$objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $nombre = $model->alu_nocontrol; //reset(explode(".", $objeto_imagen->name));
            $extension = 'png'; //end((explode(".", $objeto_imagen->name)));
            $destino = Yii::$app->basePath . "/web/img/alumno/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }*/
    }
}