<?php

namespace app\controllers;

use Yii;
use app\models\Maestro;
use yii\web\Controller;
use app\models\MaestroSearch;
use app\widgets\ImgController;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;

/**
 * MaestroController implements the CRUD actions for Maestro model.
 */
class MaestroController extends Controller
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
     * Lists all Maestro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MaestroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maestro model.
     * @param int $mae_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mae_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($mae_id),
        ]);
    }

    /**
     * Creates a new Maestro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($fkUser = null)
    {
        $model = new Maestro();

        if ($this->request->isPost) {

            //controles para contraseña y datos
            //se verifica que el elemento se haya guardado
            if ($model->load($this->request->post())) {
                //se guarda la imagen
                $this->guardarImagen($model);
                //se crear el usuario que puede iniciar sesión
                $user = new User([
                    'username' => $model->mae_rfc,
                    'password_hash' => Yii::$app->getSecurity()->generatePasswordHash($model->contrasenia1),
                    'status' => 1,
                    'email' => $model->mae_correo,
                    'email_confirmed' => 1,
                ]);
                //se comprueba si se ha guardado el usuario
                //que inicia sesión
                if ($user->save()) {
                    //se asigna el rol
                    User::assignRole($user->id, 'Maestro');
                    //se asigna el usuario al modelo maestro
                    $model->mae_fkuser = $user->id;
                    //se comprueba que se haya guardado
                    //el nuevo maestro
                    if ($model->save()) {
                        //si todo sale bien, se muestra el view
                        return $this->redirect(['view', 'mae_id' => $model->mae_id,]);
                    }
                }
            }
            //si desde el principio no viene guardado
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'fkUser' => $fkUser,
        ]);
    }

    /**
     * Updates an existing Maestro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $mae_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mae_id)
    {
        //se busca el modelo
        $model = $this->findModel($mae_id);
        //se comprueba el user o superadmin
        if ($model->mae_fkuser == Yii::$app->user->id || Yii::$app->user->isSuperAdmin) {

            //se comprueba que se haya guardado
            if ($this->request->isPost && $model->load($this->request->post())) {
                //se guarda la imagen
                $this->guardarImagen($model);

                if ($model->save()) {
                    //se identifica el usuario
                    //que inicia sesion
                    $user = $model->maeUser;
                    //se crea una bandera para cambio de correo y contraseña
                    $bandera = false;
                    //se revisa si la contraseña ha cambiado en el form
                    if ($model->contrasenia1 != '******') {
                        //se guarda la contraseña haseada
                        $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->contrasenia1);
                        $bandera = true;
                    }
                    //se verifica si el correo del ususario
                    //es diferente al del maestro
                    if ($user->email != $model->mae_correo) {
                        $user->email = $model->mae_correo;
                        $bandera = true;
                    }
                    //se revisa bandera
                    if ($bandera) {
                        $user->save();
                    }

                    //se retorna a la vista
                    return $this->redirect(['view', 'mae_id' => $model->mae_id]);
                }
            }
            //imagen
            $model->archivo_imagen = "/img/maestro/{$model->mae_rfc}.png";

            return $this->render('update', [
                'model' => $model,
                'fkUser' => '',
            ]);
        } //comprobación permisos

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Deletes an existing Maestro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $mae_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mae_id)
    {
        $this->findModel($mae_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Maestro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $mae_id Id
     * @return Maestro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mae_id)
    {
        if (($model = Maestro::findOne(['mae_id' => $mae_id])) !== null) {
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
            'rol' => 'maestro',
            'funcion' => 'save',
        ]);
    }
}