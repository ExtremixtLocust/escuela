<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dashboard */

$this->title = $model->dash_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dashboard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'dash_id' => $model->dash_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'dash_id' => $model->dash_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'das_id',
            'das_orden',
            [ 'attribute' => 'das_imagen',
                'format' => 'raw',
                'value' => function ($model) {
                    return "{$model->das_imagen}<br><div style='width: 30%;'>{$model->img}</div>";
                }
            ],
            'das_titulo',
            'das_url',
            [ 'attribute' => 'das_estatus',
            'format' => 'raw',
            'value' => function ($model) {
            return "<div style='width: 30%;'>{$model->sta}</div>";
            }
            ],
            'das_roles',
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
