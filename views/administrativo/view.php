<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Administrativo */

//hacemos que la página tenga de título
//el nombre del administrativo
$this->title = $model->adm_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administrativos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="administrativo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'adm_id' => $model->adm_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'adm_id' => $model->adm_id], [
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
            'adm_id',
            'adm_departamento_id',
            'adm_nombre',
            'adm_appaterno',
            'adm_apmaterno',
            'adm_telefono',
            'adm_direccion',
            'adm_rfc',
            'adm_correo',
        ],
    ]) ?>

</div>
