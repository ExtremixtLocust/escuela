<?php

namespace app\controllers;

use app\models\Carga;
use app\models\CargaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CargaController implements the CRUD actions for Carga model.
 */
class CargaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Carga models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CargaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carga model.
     * @param int $car_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($car_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($car_id),
        ]);
    }

    /**
     * Creates a new Carga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Carga();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'car_id' => $model->car_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Carga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $car_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($car_id)
    {
        $model = $this->findModel($car_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'car_id' => $model->car_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carga model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $car_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($car_id)
    {
        $this->findModel($car_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $car_id Id
     * @return Carga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($car_id)
    {
        if (($model = Carga::findOne(['car_id' => $car_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
