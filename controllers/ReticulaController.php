<?php

namespace app\controllers;

use app\models\Reticula;
use app\models\ReticulaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ReticulaController implements the CRUD actions for Reticula model.
 */
class ReticulaController extends Controller
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
     * Lists all Reticula models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReticulaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reticula model.
     * @param int $ret_id Id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ret_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ret_id),
        ]);
    }

    /**
     * Creates a new Reticula model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reticula();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ret_id' => $model->ret_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reticula model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ret_id Id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ret_id)
    {
        $model = $this->findModel($ret_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ret_id' => $model->ret_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reticula model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ret_id Id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ret_id)
    {
        $this->findModel($ret_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reticula model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ret_id Id
     * @return Reticula the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ret_id)
    {
        if (($model = Reticula::findOne(['ret_id' => $ret_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
