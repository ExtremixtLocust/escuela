<?php

namespace app\controllers;

use app\models\Trabajador;
use app\models\TrabajadorSearch;
use webvimark\modules\UserManagement\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TrabajadorController implements the CRUD actions for Trabajador model.
 */
class TrabajadorController extends Controller
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
     * Lists all Trabajador models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrabajadorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trabajador model.
     * @param int $tra_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tra_id)
    {
        $model = $this->findModel($tra_id);

        if ($model->tra_fkuser == Yii::$app->user->id || Yii::$app->user->isSuperAdmin){
            return $this->render('view', [
                'model' => $model,
            ]); 
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Trabajador();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->tra_fkuser=1;
                if ($model->save()) {
                    return $this->redirect(['view', 'tra_id' => $model->tra_id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trabajador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tra_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tra_id)
    {
        $model = $this->findModel($tra_id);

        if (User::hasRole(['Administrativo']) || $model->tra_fkuser == Yii::$app->user->id){
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tra_id' => $model->tra_id]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Deletes an existing Trabajador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tra_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tra_id)
    {
        $this->findModel($tra_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trabajador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tra_id Id
     * @return Trabajador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tra_id)
    {
        if (($model = Trabajador::findOne(['tra_id' => $tra_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
