<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Reticula;
use app\models\Materia;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Reticula */

$this->title = $model->ret_carrera;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Retículas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reticula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'ret_id' => $model->ret_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'ret_id' => $model->ret_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a(Yii::t('app', 'Ver Materias'), ['/carga/index', 'CargaSearch[car_reticula_id]' => $model->ret_id], ['class' => 'btn btn-info']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ret_id',
            'ret_carrera'
        ],
    ]) ?>

</div>