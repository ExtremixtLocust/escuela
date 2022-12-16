<?php

namespace app\controllers;

use app\models\Maestro;
use app\models\MaestroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

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
    public function actionCreate()
    {
        $model = new Maestro();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mae_id' => $model->mae_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
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
        $model = $this->findModel($mae_id);
        if ($model->mae_fkuser == Yii::$app->user->id || Yii::$app->user->isSuperAdmin) {

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mae_id' => $model->mae_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

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
}