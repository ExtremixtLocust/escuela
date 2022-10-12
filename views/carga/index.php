<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Carga;
use yii\helpers\ArrayHelper;
use app\models\Materia;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cargas');
$this->params['breadcrumbs'][] = ['label' => 'Retículas', 'url' => '/reticula/index'];
$this->params['breadcrumbs'][] = $this->title;
$reticulas = ArrayHelper::map(Materia::find()->all(), 'mat_id', 'mat_nombre');
?>
<div class="carga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Carga'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //no necesitamos ver el id
            //'car_id',
            //'car_reticula_id',
            //comentamos el id de la materia
            //'car_materia_id',
            //añadimos el método para ver el nombre de la materia
            'materia',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carga $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'car_id' => $model->car_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
