<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dashboard */

$this->title = $model->dash_titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dashboard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'dash_id' => $model->dash_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'dash_id' => $model->dash_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Está seguro de borrar este elemento?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dash_id',
            'dash_orden',
            [ 'attribute' => 'dash_img',
                'format' => 'raw',
                'value' => function ($model) {
                    return "{$model->dash_img}<br><div style='width: 30%;'>{$model->img}</div>";
                }
            ],
            'dash_titulo',
            'dash_url',
            [ 'attribute' => 'dash_estatus',
            'format' => 'raw',
            'value' => function ($model) {
            return "<div style='width: 30%;'>{$model->sta}</div>";
            }
            ],
            'dash_roles',
            /* codigo anterior
            'dash_id',
            'dash_titulo',
            'dash_img',
            'dash_descripcion',
            'dash_url:url',
            'dash_estatus',
            'dash_roles',
            */
        ],
    ]) ?>

</div>
