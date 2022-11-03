<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Dashboard;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DashboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dashboards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dashboard'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                //se agrega un botón para limpiar el buscador
                'header' => Html::a('<i class="bi bi-recycle"></i>', ['index'])
            ],
            'dash_id',
            'dash_orden',
            [
                'attribute' => 'das_imagen',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<center>{$model->dash_imagen}<br>{$model->img}</center>";
                }
            ],
            'dash_titulo',
            'dash_url',
            [
                'attribute' => 'dash_estatus',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->sta;
                }
            ],
            'dash_roles',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dashboard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'dash_id' => $model->das_id]);
                },
                'contentOptions' => ['style' => 'width: 80px;']
            ],
            /* código anterior
            'dash_id',
            'dash_titulo',
            'dash_img',
            'dash_descripcion',
            'dash_url:url',
            //'dash_estatus',
            //'dash_roles',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dashboard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'dash_id' => $model->dash_id]);
                 }
            ],
*/
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>