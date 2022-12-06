<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Administrativo;
use app\widgets\SeguridadUsuario;
use yii\web\NotFoundHttpException;
use app\models\AdministrativoSearch;

/**
 * AdministrativoController implements the CRUD actions for Administrativo model.
 */
class AdministrativoController extends Controller
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
     * Lists all Administrativo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdministrativoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Administrativo model.
     * @param int $adm_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($adm_id)
    {
        $model = $this->findModel($adm_id);
        /*
        return $this->render('view', [
            'model' => $this->findModel($adm_id),
        ]);
        */
        if (SeguridadUsuario::widget(['model' => $model,])) {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Administrativo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Administrativo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'adm_id' => $model->adm_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Administrativo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $adm_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($adm_id)
    {
        $model = $this->findModel($adm_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'adm_id' => $model->adm_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Administrativo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $adm_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($adm_id)
    {
        $this->findModel($adm_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Administrativo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $adm_id Id
     * @return Administrativo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($adm_id)
    {
        if (($model = Administrativo::findOne(['adm_id' => $adm_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
