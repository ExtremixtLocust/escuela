<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajador */

$this->title = $model->tra_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trabajadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trabajador-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'tra_id' => $model->tra_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'tra_id' => $model->tra_id], [
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
            'tra_id',
            'tra_departamento_id',
            'tra_nombre',
            'tra_appaterno',
            'tra_apmaterno',
            'tra_rfc',
            'tra_direccion',
            'tra_telefono',
            'tra_correo',
        ],
    ]) ?>

</div>