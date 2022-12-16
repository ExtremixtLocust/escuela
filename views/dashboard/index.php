<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\Dashboard;
use app\widgets\Acciones;
use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DashboardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dashboards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dashboard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Dashboard'), ['create'], ['class' => 'btn btn-success']) ?>
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
            //'dash_id',
            'dash_orden',
            [
                'attribute' => 'dash_img',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<center>{$model->dash_img}<br>{$model->img}</center>";
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
            Acciones::botones('dash_id'),
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>