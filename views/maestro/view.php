<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maestro */

//hacemos que la página tenga de título
//el nombre del maestro
$this->title = $model->mae_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maestros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="maestro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'mae_id' => $model->mae_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'mae_id' => $model->mae_id], [
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
            'mae_id',
            //'mae_departamento_id',
            'departamento',
            'mae_nombre',
            'mae_appaterno',
            'mae_apmaterno',
            'mae_rfc',
            'mae_telefono',
            'mae_direccion',
            'mae_correo',
        ],
    ]) ?>

</div>
