<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Dashboard;
use yii\web\UploadedFile;
use app\models\DashboardSearch;
use yii\web\NotFoundHttpException;


/**
 * DashboardController implements the CRUD actions for Dashboard model.
 */
class DashboardController extends Controller
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
     * Lists all Dashboard models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DashboardSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dashboard model.
     * @param int $dash_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($dash_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($dash_id),
        ]);
    }

    /**
     * Creates a new Dashboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dashboard();

        if ($this->request->isPost){
            if ($model->load($this->request->post())) {
                $this->guardarImagen($model);
                $model->dash_roles = join(',', $model->lista_roles);
                if ($model->save()) {
                    return $this->redirect(['view', 'dash_id' => $model->dash_id]);
                }
                echo "<pre>";
                var_dump($model->errors);
                echo "</pre>";
                die;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dashboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $dash_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($dash_id)
    {
        $model = $this->findModel($dash_id);

        if ($this->request->isPost && $model->load($this->request->post())) {
                $this->guardarImagen($model);
                $model->dash_roles = join(',', $model->lista_roles);
                if ($model->save()) {
                    return $this->redirect(['view', 'dash_id' => $model->dash_id]);
                }
            }
            $model->archivo_imagen = "/img/dashboard/{$model->dash_img}.png";
            $model->lista_roles = explode(',', $model->dash_roles);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    //método creado para
    //guardar la imagen
    private function guardarImagen($model)
    {
        $objeto_imagen = UploadedFile::getInstance($model, 'archivo_imagen');
        if (!is_null($objeto_imagen)) {
            $nombre = $model->dash_img; //reset(explode(".", $objeto_imagen->name));
            $extension = 'png'; //end((explode(".", $objeto_imagen->name)));
            $destino = Yii::$app->basePath . "/web/img/dashboard/{$nombre}.{$extension}";
            $objeto_imagen->saveAs($destino);
        }
    }
    /**
     * Deletes an existing Dashboard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $dash_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($dash_id)
    {
        $this->findModel($dash_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dashboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $dash_id Id
     * @return Dashboard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($dash_id)
    {
        if (($model = Dashboard::findOne(['dash_id' => $dash_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
